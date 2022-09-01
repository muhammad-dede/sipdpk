<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Harus diterima.',
    'active_url' => 'URL tidak valid.',
    'after' => 'Harus berupa tanggal setelah :date.',
    'after_or_equal' => 'Harus berupa tanggal setelah atau sama dengan :date.',
    'alpha' => 'Hanya diisi dengan huruf.',
    'alpha_dash' => 'Hanya diisi dangan huruf, angka, tanda hubung, dan garis bawah.',
    'alpha_num' => 'Hanya diisi dengan huruf dan angka.',
    'array' => 'Harus berupa array',
    'before' => 'Harus diisi dengan tanggal sebelum :date.',
    'before_or_equal' => 'Harus diisi dengan tanggal sebelum atau sama dengan :date.',
    'between' => [
        'numeric' => 'Harus antara :min dan :max.',
        'file' => 'Harus antara :min dan :max kilobyte.',
        'string' => 'Harus antara :min dan :max karakter.',
        'array' => 'Harus memiliki antara :min dan :max item.',
    ],
    'boolean' => 'Hanya diisi dengan benar atau salah.',
    'confirmed' => 'Konfirmasi password tidak cocok.',
    'date' => 'Bukan tanggal yang valid.',
    'date_equals' => 'Harus berupa tanggal yang sama dengan :date.',
    'date_format' => 'Tidak cocok dengan format :format.',
    'different' => 'Harus berbeda dari yang lain.',
    'digits' => 'Harus :digit digit.',
    'digits_between' => 'Harus antara :min dan :max digit.',
    'dimensions' => 'Memiliki dimensi gambar yang tidak valid.',
    'distinct' => 'Memiliki nilai duplikat.',
    'email' => 'Harus berupa email yang valid.',
    'ends_with' => 'Harus diakhiri dengan salah satu dari berikut ini: :values.',
    'exists' => 'Tidak valid',
    'file' => 'Harus berupa file.',
    'filled' => 'Harus memiliki nilai.',
    'gt' => [
        'numeric' => 'Harus lebih besar dari :value.',
        'file' => 'Harus lebih besar dari :value kilobyte',
        'string' => 'Harus lebih besar dari :value karakter.',
        'array' => 'Harus memiliki lebih dari :value item.',
    ],
    'gte' => [
        'numeric' => 'Harus lebih besar dari atau sama dengan :value.',
        'file' => 'Harus lebih besar dari atau sama dengan :value kilobytes.',
        'string' => 'Harus lebih besar dari atau sama dengan :value karakter.',
        'array' => 'Harus memiliki :value item atau lebih.',
    ],
    'image'    => 'Harus berupa gambar.',
    'in'       => 'Data yang dipilih tidak valid.',
    'in_array' => 'Data tidak ada di dalam :other.',
    'integer'  => 'Harus berupa bilangan bulat.',
    'ip'       => 'Harus berupa alamat IP yang valid.',
    'ipv4'     => 'Harus berupa alamat IPv4 yang valid.',
    'ipv6'     => 'Harus berupa alamat IPv6 yang valid.',
    'json'     => 'Harus berupa JSON string yang valid.',
    'lt'       => [
        'numeric' => 'Harus bernilai kurang dari :value.',
        'file'    => 'Harus berukuran kurang dari :value kilobite.',
        'string'  => 'Harus berisi kurang dari :value karakter.',
        'array'   => 'Harus memiliki kurang dari :value anggota.',
    ],
    'lte' => [
        'numeric' => 'Harus bernilai kurang dari atau sama dengan :value.',
        'file'    => 'Harus berukuran kurang dari atau sama dengan :value kilobite.',
        'string'  => 'Harus berisi kurang dari atau sama dengan :value karakter.',
        'array'   => 'Harus tidak lebih dari :value anggota.',
    ],
    'max' => [
        'numeric' => 'Maksimal bernilai :max.',
        'file'    => 'Maksimal berukuran :max kilobite.',
        'string'  => 'Maksimal berisi :max karakter.',
        'array'   => 'Maksimal terdiri dari :max anggota.',
    ],
    'mimes'     => 'Harus berupa berkas berjenis: :values.',
    'mimetypes' => 'Harus berupa berkas berjenis: :values.',
    'min'       => [
        'numeric' => 'Minimal bernilai :min.',
        'file'    => 'Minimal berukuran :min kilobite.',
        'string'  => 'Minimal berisi :min karakter.',
        'array'   => 'Minimal terdiri dari :min anggota.',
    ],
    'not_in'               => 'Data yang dipilih tidak valid.',
    'not_regex'            => 'Format tidak valid.',
    'numeric'              => 'Harus berupa angka.',
    'password'             => 'Password salah.',
    'present'              => 'Wajib ada.',
    'regex'                => 'Format tidak valid.',
    'required'             => 'Wajib diisi.',
    'required_if'          => 'Wajib diisi bila :other adalah :value.',
    'required_unless'      => 'Wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => 'Wajib diisi bila terdapat :values.',
    'required_with_all'    => 'Wajib diisi bila terdapat :values.',
    'required_without'     => 'Wajib diisi bila tidak terdapat :values.',
    'required_without_all' => 'Wajib diisi bila sama sekali tidak terdapat :values.',
    'same'                 => 'dan :other harus sama.',
    'size'                 => [
        'numeric' => 'Harus berukuran :size.',
        'file'    => 'Harus berukuran :size kilobyte.',
        'string'  => 'Harus berukuran :size karakter.',
        'array'   => 'Harus mengandung :size anggota.',
    ],
    'starts_with' => 'Harus diawali salah satu dari berikut: :values',
    'string'      => 'Harus berupa string.',
    'timezone'    => 'Harus berisi zona waktu yang valid.',
    'unique'      => 'Data sudah ada sebelumnya.',
    'uploaded'    => 'Gagal diunggah.',
    'url'         => 'Format tidak valid.',
    'uuid'        => 'Harus merupakan UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
