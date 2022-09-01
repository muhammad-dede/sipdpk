<?php

namespace App\Imports;

use App\Models\Rc;
use App\Models\Samsat;
use App\Models\Stnk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RcImport implements ToModel, withHeadingRow
{
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $samsat = Samsat::updateOrCreate(['uptd_gerai' => $row['uptd_gerai_samsat']], [
            'uptd_gerai' => strtoupper($row['uptd_gerai_samsat']),
            'wilayah' => strtoupper($row['wilayah_samsat']),
            'alamat' => strtoupper($row['alamat_samsat']),
        ]);

        $stnk = Stnk::updateOrCreate(['nopol' => strtoupper(str_replace(' ', '', $row['nopol']))], [
            'nopol' => strtoupper(str_replace(' ', '', $row['nopol'])),
            'nama' => strtoupper($row['nama']),
            'alamat' => strtoupper($row['alamat']),
            'tgl_awal_pkb' => $this->transformDate($row['tgl_awal_pkb']),
            'id_samsat' => $samsat->id,
        ]);

        return new Rc([
            'id_stnk' => $stnk->id,
            'tgl_akhir_pkb' => $this->transformDate($row['tgl_akhir_pkb']),
        ]);
    }
}
