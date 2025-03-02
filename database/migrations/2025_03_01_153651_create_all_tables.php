<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        // Table landingpage
        Schema::create('landingpage', function (Blueprint $table) {
            $table->id();
            $table->string('nom_page')->unique();
            $table->string('cadeau_nom');
            $table->enum('type', ['gift', 'vente']);
            $table->string('cadeau_path', 500);
            $table->text('email_html');
            $table->timestamps();
            $table->boolean('IsDeleted')->default(0);
        });

        // Table prospect
        Schema::create('prospect', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->timestamp('date_enregistrement')->useCurrent();
            $table->unsignedBigInteger('landingpage_id')->nullable();
            $table->foreign('landingpage_id')->references('id')->on('landingpage')->onDelete('cascade');
        });

        // Vue SQL
        DB::statement("
            CREATE OR REPLACE VIEW v_landingpage_prospect AS
            SELECT 
                lp.id AS landingpage_id,
                lp.nom_page,
                lp.cadeau_nom,
                lp.type,
                lp.cadeau_path,
                lp.email_html,
                lp.IsDeleted,
                COUNT(p.id) AS total_prospects
            FROM landingpage lp
            LEFT JOIN prospect p ON p.landingpage_id = lp.id
            GROUP BY lp.id, lp.nom_page, lp.cadeau_nom, lp.type, lp.cadeau_path, lp.email_html, lp.IsDeleted;
        ");
    }

    public function down()
    {
        Schema::dropIfExists('v_landingpage_prospect');
        Schema::dropIfExists('prospect');
        Schema::dropIfExists('landingpage');
    }
};
