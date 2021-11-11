</div>
</div>
</div>

<div class="container fixed-bottom">
    <span class="text-muted float-end py-2"><i class="far fa-copyright"></i> <?= date('Y') ?> | Humaidi Zakaria built with Bootsrap 5</span>
</div>



<!-- Modal -->
<div class="modal fade" id="logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="logoutLabel"><i class="fas fa-exclamation-triangle"></i> Peringatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda ingin logout dan mengakhiri session..?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="<?= base_url('auth/logout.php') ?>" type="button" class="btn btn-danger">Ya, Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>