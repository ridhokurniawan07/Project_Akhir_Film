<tr>
    <td><?= $no; ?></td> <!-- Menampilkan nomor berurutan -->
    <td><?= $genre['genre_name'] ?></td>
    <td>
        <div class="d-flex gap-2">
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editGenreModal<?= $genre['genre_id'] ?>">Edit</button>
            <a href="datagenre.php?action=delete&genre_id=<?= $genre['genre_id']?>"><button class="btn btn-danger">Hapus</button></a>
        </div>
    </td>
</tr>