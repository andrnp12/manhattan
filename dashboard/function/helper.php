<script>
    function setActiveLink(linkElement) {
        document.querySelectorAll('.sidebar-link').forEach(link => link.classList.remove('active'));
        linkElement.classList.add('active');
        localStorage.setItem('activeLink', linkElement.textContent.trim());
    }

    function loadPage(page) {
        fetch(`index.php?page=${page}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.text())
            .then(html => {
                document.getElementById('content').innerHTML = html;
                history.pushState({}, '', `?page=${page}`);
                localStorage.setItem('lastPage', page);
            })
            .catch(() => {
                document.getElementById('content').innerHTML = '<h2>Halaman tidak ditemukan.</h2>';
            });
    }

    // Event delegation untuk tombol edit dan tambah materi
    document.getElementById('content').addEventListener('click', function(e) {
        // Tombol Edit Materi
        if (e.target.closest('.edit-btn')) {
            let btn = e.target.closest('.edit-btn');
            let id = btn.dataset.id;
            console.log("Edit Materi ID:", id);

            // contoh buka modal edit
            let modal = new bootstrap.Modal(document.getElementById('formEditMateri'));
            modal.show();

            // isi form edit pakai data-id atau fetch detail dari server
        }

        // Tombol Tambah Materi
        if (e.target.closest('.tambah-btn')) {
            console.log("Tambah Materi dibuka");

            // buka modal tambah
            let modal = new bootstrap.Modal(document.getElementById('formTambahMateri'));
            modal.show();
        }
    });

    window.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const page = urlParams.get('page') || localStorage.getItem('lastPage') || 'dashboard';

        loadPage(page);

        // Tandai link aktif
        const activeLinkText = localStorage.getItem('activeLink');
        if (activeLinkText) {
            document.querySelectorAll('.sidebar-link').forEach(link => {
                if (link.textContent.trim() === activeLinkText) {
                    link.classList.add('active');
                }
            });
        }
    });

    // Supaya tombol back/forward browser tetap bekerja
    window.addEventListener('popstate', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const page = urlParams.get('page') || 'dashboard';
        loadPage(page);
    });
</script>



<!-- mengatur dropdown topik berdasarkan kategori di modal -->
<script>
    // ambil data dari PHP ke JS
    const categories = <?php echo json_encode($categories); ?>;

    const kategoriSelect = document.getElementById('kategoriSelect');
    const topikSelect = document.getElementById('topikSelect');

    kategoriSelect.addEventListener('change', function() {
        const kategoriId = this.value;
        topikSelect.innerHTML = ''; // kosongkan dulu

        if (!kategoriId) {
            topikSelect.innerHTML = '<option value="">-- Pilih Topik --</option>';
            return;
        }

        const kategori = categories.find(c => c.id == kategoriId);

        if (kategori && kategori.topics.length > 0) {
            topikSelect.innerHTML = '<option value="">-- Pilih Topik --</option>';
            kategori.topics.forEach(topik => {
                const opt = document.createElement('option');
                opt.value = topik.id;
                opt.textContent = topik.title;
                topikSelect.appendChild(opt);
            });
        } else {
            topikSelect.innerHTML = '<option disabled>Belum ada topik di kategori ini</option>';
        }
    });
</script>