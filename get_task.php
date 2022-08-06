<?php 

require_once('connection.php');

$sql = "SELECT * FROM tasks";

$query = $conn->query($sql);

$no = 1;

if ($query->num_rows == 0) {
	?>
	<tr>
		<td colspan="8" align="center">No Data</td>
	</tr>
	<?php
} else {
	while ($row = $query->fetch_assoc()){
		if($row['is_archive'] == 0){
		?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $row['tanggal'] ?></td>
				<td><?= $row['dokter'] ?></td>
				<td><?= $row['no'] ?></td>
				<td><?= $row['rm'] ?></td>
				<td><?= $row['nama'] ?></td>
				<td><?= $row['keterangan'] ?></td>
				<td>
					<?php if ($row['is_finish'] == 0): ?>
						<button type="button" data-url="mark_as_finish.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-success btn-finish">Finish</button>
					<?php endif ?>
					<button type="button" data-url="archive_task.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning text-white btn-archive">Archive</button>
				</td>
			</tr>
		<?php
		}
	}
}

?>