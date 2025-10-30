<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            // If your MySQL/MariaDB supports JSON; otherwise use text()
            $table->json('title')->nullable()->after('id');
        });

        // Backfill JSON from old columns
        DB::table('documents')
            ->select('id', 'title_en', 'title_fr')
            ->orderBy('id')
            ->chunkById(200, function ($rows) {
                foreach ($rows as $r) {
                    $json = [];
                    if (!empty($r->title_en)) $json['en'] = $r->title_en;
                    if (!empty($r->title_fr)) $json['fr'] = $r->title_fr;
                    DB::table('documents')->where('id', $r->id)
                        ->update(['title' => json_encode($json)]);
                }
            });

        // Drop the old columns
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'title_fr']);
        });
    }

    public function down(): void
    {
        // Recreate old columns
        Schema::table('documents', function (Blueprint $table) {
            $table->string('title_en')->nullable();
            $table->string('title_fr')->nullable();
        });

        // Split JSON back into two columns
        DB::table('documents')
            ->select('id', 'title')
            ->orderBy('id')
            ->chunkById(200, function ($rows) {
                foreach ($rows as $r) {
                    $en = $fr = null;
                    if ($r->title) {
                        $arr = json_decode($r->title, true) ?: [];
                        $en = $arr['en'] ?? null;
                        $fr = $arr['fr'] ?? null;
                    }
                    DB::table('documents')->where('id', $r->id)
                        ->update(['title_en' => $en, 'title_fr' => $fr]);
                }
            });

        // Remove JSON column
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('title');
        });
    }
};
