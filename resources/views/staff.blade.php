<table>
    <thead>
        <td>Bil</td>
        <td>Nombor Tag </td>
        <td>Nama Staf</td>
        </thead>
        @forelse ( $staffs as $staff )
            <tr>
                <td>{{ $loop ->iteration }}</td>
                <td>{{ $staff ->tag }}</td>
                <td>{{ $staff ->users ->name }}</td>  
            </tr>
        @empty
            <tr>
                <td colspan="3">Data Tidak Wujud</td>
            </tr>
        @endforelse
        

</table>



