<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> Your Profil Info </h4>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                <tbody class="table-border-bottom-0">
                    <tr class="table-active">
                        <td><i class="fab fa-sketch fa-lg text-warning me-3"></i> ID </td>
                        <td>:</td>
                        <td><?php echo $_SESSION['users']['id_user']; ?></td>
                    </tr>
                    <tr class="table-primary">
                        <td><i class="fab fa-sketch fa-lg text-warning me-3"></i> Username </td>
                        <td>:</td>
                        <td><?php echo $_SESSION['users']['username']; ?></td>
                    </tr>
                    <tr class="table-success">
                        <td><i class="fab fa-sketch fa-lg text-warning me-3"></i> Nama </td>
                        <td width ="1">:</td>
                        <td><?php echo $_SESSION['users']['nama']; ?></td>
                    </tr>
                    <tr class="table-warning">
                        <td><i class="fab fa-sketch fa-lg text-warning me-3"></i> Alamat </td>
                        <td width ="1">:</td>
                        <td><?php echo $_SESSION['users']['alamat']; ?></td>
                    </tr>
                    <tr class="table-info">
                        <td><i class="fab fa-sketch fa-lg text-warning me-3"></i> Password </td>
                        <td width ="1">:</td>
                        <td><?php echo $_SESSION['users']['password']; ?></td>
                    </tr>
                    <tr class="table-active">
                        <td><i class="fab fa-sketch fa-lg text-warning me-3"></i> Level </td>
                        <td width ="1">:</td>
                        <td><?php echo $_SESSION['users']['level']; ?></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


