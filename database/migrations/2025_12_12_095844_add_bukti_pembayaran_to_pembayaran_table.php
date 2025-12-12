public function up()
{
    Schema::table('pembayaran', function (Blueprint $table) {
        $table->string('bukti_pembayaran')->nullable();
    });
}

public function down()
{
    Schema::table('pembayaran', function (Blueprint $table) {
        $table->dropColumn('bukti_pembayaran');
    });
}
