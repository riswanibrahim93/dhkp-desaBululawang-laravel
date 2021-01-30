<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NOP</th>
            <th>Alamat</th>
            <th>RT/RW</th>
            <th>Luas Tanah</th>
            <th>Luas Bangunan</th>
            <th>Persil</th>
            <th>Leter C</th>
            <th>Nama WP</th>
            <th>Daftar Kepemilikan</th>
            <th>Alamat WP</th>
            <th>RT/RW WP</th>
            <th>Kelurahan</th>
            <th>Kota</th>
            <th>PBB</th>
            <th>Latitude Lokasi</th>
            <th>Longitude Lokasi</th>
            <th>Lokasi</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1 @endphp
        @php $at = '@';@endphp
        @foreach($data_dhkp as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->nop }}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->rt_rw }}</td>
            <td>{{ $data->luas_tanah }}</td>
            <td>{{ $data->luas_bangunan }}</td>
            <td>{{ $data->persil }}</td>
            <td>{{ $data->c }}</td>
            <td>{{ $data->nama_wp }}</td>
            <td>{{ $data->nama_kepemilikan }}</td>
            <td>{{ $data->alamat_wp }}</td>
            <td>{{ $data->rt_rw_wp }}</td>
            <td>{{ $data->kelurahan }}</td>
            <td>{{ $data->kota }}</td>
            <td>{{ $data->pbb }}</td>
            <td>{{ $data->lat }}</td>
            <td>{{ $data->longi }}</td>
            <td>https://www.google.com/maps/place/{{$data->lat}},+{{$data->longi}}/{{$at}}{{$data->lat}},{{$data->longi}},19z</td>
        </tr>
        @endforeach
    </tbody>
</table>