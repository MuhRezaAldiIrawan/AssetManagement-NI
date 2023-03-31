<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER logactivitybarang AFTER UPDATE ON `barangs` FOR EACH ROW
            BEGIN
                DECLARE activity VARCHAR(50);
                IF NEW.stock > OLD.stock THEN
                    SET activity = "masuk";
                ELSEIF NEW.stock < OLD.stock THEN
                    SET activity = "keluar";
                ELSE
                    SET activity = NULL;
                END IF;
    
                IF activity IS NOT NULL THEN
                    INSERT INTO `log_activity_barangs` (`tanggal`, `nama_equipment`, `unit`, `merk`, `stock`, `activity`) 
                    VALUES (NOW(), NEW.nama_equipment, NEW.unit, NEW.merk, ABS(NEW.stock - OLD.stock), activity);
                END IF;
            END');
    }
    
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `logactivitybarang`');
    }
}
