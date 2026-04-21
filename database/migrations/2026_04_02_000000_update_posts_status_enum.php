<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE posts ALTER COLUMN status DROP DEFAULT");
        
        // Create enum type
        DB::statement("DO $$ 
            BEGIN 
                IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = 'posts_status_enum') THEN 
                    CREATE TYPE posts_status_enum AS ENUM ('lost', 'found');
                END IF;
            END $$");
        DB::statement("ALTER TYPE posts_status_enum ADD VALUE IF NOT EXISTS 'pending'");
        DB::statement("ALTER TYPE posts_status_enum ADD VALUE IF NOT EXISTS 'returned'");
        
        // Add temp column and swap
        DB::statement("ALTER TABLE posts ADD COLUMN status_new posts_status_enum");
        DB::statement("UPDATE posts SET status_new = status::posts_status_enum");
        DB::statement("ALTER TABLE posts DROP COLUMN status");
        DB::statement("ALTER TABLE posts RENAME COLUMN status_new TO status");
        DB::statement("ALTER TABLE posts ALTER COLUMN status SET DEFAULT 'lost'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE posts ADD COLUMN status_old VARCHAR(50)");
        DB::statement("UPDATE posts SET status_old = status::text");
        DB::statement("ALTER TABLE posts DROP COLUMN status");
        DB::statement("ALTER TABLE posts RENAME COLUMN status_old TO status");
    }
};