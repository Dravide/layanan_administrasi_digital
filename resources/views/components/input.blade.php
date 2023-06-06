@if($value == 'nama_guru')

    <select data-plugin="customselect" class="form-select" data-placeholder="Nama Guru" name="{{ $value  }}">
        <option></option>
        @foreach($datasiswa['data'] as $guru)
            <option value="{{ $guru['nama'] }}">{{ $guru['nama'] }} ({{ $guru['kelas'] }})</option>
        @endforeach
    </select>

@elseif($value == 'pangkat_golongan')

    <select data-plugin="customselect" class="form-select" data-placeholder="Pangkat Golongan" name="{{ $value  }}">
        <option></option>
        <option value="Juru Muda">Juru Muda</option>
        <option value="Juru Muda Tingkat 1">Juru Muda Tingkat 1</option>
        <option value="Juru">Juru</option>
        <option value="Juru Tingkat 1">Juru Tingkat 1</option>
    </select>
@elseif($value == 'tujuan')

    <textarea type="text" name="{{ $value }}"
              placeholder="Tujuan"
              class="form-control">{{ $old }}</textarea>
@elseif($value == 'hari')

    <select data-plugin="customselect" class="form-select" data-placeholder="Pilih Hari" name="{{ $value }}">
        <option></option>
        <option value="Senin">Senin</option>
        <option value="Selasa">Selasa</option>
        <option value="Rabu">Rabu</option>
        <option value="Kamis">Kamis</option>
        <option value="Jum'at">Jum'at</option>
        <option value="Sabtu">Sabtu</option>
        <option value="Minggu">Minggu</option>
    </select>
@elseif($value == 'tanggal')
    <input type="date" name="{{ $value }}"
           placeholder="Masukan Input"
           class="form-control form-control-sm"
           value="{{ $old || old($value) }}"/>
@elseif($value == 'pukul')
    <input type="time" name="{{ $value }}"
           placeholder="Masukan Input"
           class="form-control form-control-sm"
           value="{{ $old }}"/>
@elseif($value == 'nip')
    <input type="number" name="{{ $value }}"
           placeholder="Masukan Input"
           class="form-control form-control-sm"
           value="{{ $old }}"/>
@else
    <input type="text" name="{{ $value }}"
           placeholder="Masukan Input"
           class="form-control form-control-sm"
           value="{{ $old }}"/>
@endif

