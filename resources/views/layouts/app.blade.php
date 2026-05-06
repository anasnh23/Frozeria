<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Frozeria Stok')</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; background: #f7f7f7; color: #001b3f; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
        a { color: inherit; text-decoration: none; }
        .app { max-width: 1120px; margin: 4px auto; border: 1px solid #bdbdbd; background: #fff; min-height: calc(100vh - 8px); }
        .nav { height: 49px; background: #181818; color: #fff; display: flex; align-items: center; gap: 18px; padding: 0 18px; }
        .brand { font-size: 14px; font-weight: 700; }
        .brand span { font-weight: 400; color: #d8d8d8; }
        .nav-links { display: flex; align-items: center; gap: 12px; flex: 1; }
        .nav-link { border: 1px solid transparent; padding: 7px 12px; color: #f1f1f1; }
        .nav-link.active { border-color: #666; background: #242424; }
        .content { padding: 18px; }
        .topbar { display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 16px; }
        .title-row { display: flex; align-items: center; gap: 12px; }
        h1 { font-size: 16px; margin: 0; color: #00142d; }
        .btn { display: inline-flex; align-items: center; justify-content: center; min-height: 29px; border: 1px solid #bdbdbd; background: #fff; color: #001b3f; padding: 6px 12px; cursor: pointer; font-size: 12px; }
        .btn-dark { border-color: #666; background: #222; color: #fff; }
        .btn-blue { border-color: #8099ff; color: #1648d8; }
        .btn-red { border-color: #ee8d8d; color: #b41414; }
        .btn-green { border-color: #9bd76a; color: #317900; }
        .btn:hover { filter: brightness(.97); }
        .cards { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-bottom: 16px; }
        .stat-card { border: 1px solid #d2d2d2; background: #fbfbfb; padding: 16px 14px; min-height: 82px; }
        .stat-label { color: #66748a; margin-bottom: 8px; }
        .stat-value { font-size: 26px; font-weight: 700; color: #000; }
        .filters { display: grid; grid-template-columns: 1fr 165px auto; gap: 8px; margin-bottom: 12px; }
        input, select, textarea { width: 100%; border: 1px solid #bdbdbd; padding: 8px 10px; background: #fff; color: #001b3f; font-size: 12px; border-radius: 0; }
        textarea { min-height: 64px; resize: vertical; }
        label { display: block; margin: 0 0 7px; }
        .required { color: #c52222; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { border: 1px solid #dedede; padding: 9px 10px; text-align: left; vertical-align: middle; }
        th { background: #f1f1f1; font-weight: 700; }
        .table-actions { display: flex; gap: 6px; flex-wrap: wrap; }
        .tag { display: inline-block; border: 1px solid #bfbfbf; background: #f8f8f8; padding: 3px 10px; color: #001b3f; }
        .muted { color: #657386; }
        .table-footer { display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #eee; padding-top: 14px; margin-top: 14px; }
        .pagination { display: flex; gap: 4px; }
        .pagination span, .pagination a { border: 1px solid #c8c8c8; padding: 6px 9px; background: #fff; }
        .pagination .active { border-color: #8099ff; color: #1648d8; background: #eef2ff; }
        .alert { border: 1px solid #bbe0b7; color: #256b1d; background: #f3fff0; padding: 10px 12px; margin-bottom: 12px; }
        .errors { border: 1px solid #efaaaa; color: #9c1111; background: #fff5f5; padding: 10px 12px; margin-bottom: 12px; }
        .detail-head { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; }
        .detail-main { display: flex; gap: 18px; align-items: flex-start; margin-bottom: 18px; }
        .photo-box { width: 104px; height: 104px; border: 1px solid #cfcfcf; background: #f7f7f7; display: flex; align-items: center; justify-content: center; color: #999; overflow: hidden; }
        .photo-box img { width: 100%; height: 100%; object-fit: cover; }
        .info-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin-bottom: 12px; }
        .info-box, .description-box, .help-box, .note-box { border: 1px solid #d7d7d7; background: #fbfbfb; padding: 12px 14px; }
        .info-label { color: #657386; margin-bottom: 7px; }
        .info-value { font-weight: 700; font-size: 14px; }
        .form-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 13px; }
        .form-full { grid-column: 1 / -1; }
        .upload { border: 1px dashed #bdbdbd; background: #fbfbfb; min-height: 180px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 9px; text-align: center; color: #657386; }
        .upload-icon { width: 40px; height: 40px; border: 1px solid #c8c8c8; display: flex; align-items: center; justify-content: center; color: #aaa; font-size: 20px; background: #fff; }
        .upload-preview { width: 120px; height: 90px; border: 1px solid #c8c8c8; object-fit: cover; background: #fff; }
        .form-actions { display: flex; justify-content: flex-end; gap: 10px; margin-top: 16px; }
        .modal-backdrop { position: fixed; inset: 0; background: rgba(0, 0, 0, .12); display: none; align-items: center; justify-content: center; padding: 20px; }
        .modal-backdrop.open { display: flex; }
        .modal { width: 390px; background: #fff; border: 1px solid #bfbfbf; padding: 22px 18px 18px; color: #001b3f; }
        .modal-body { display: flex; gap: 12px; }
        .modal-icon { width: 32px; height: 32px; border: 1px solid #ee8d8d; color: #d21e1e; display: flex; align-items: center; justify-content: center; font-weight: 700; background: #fff5f5; flex: 0 0 auto; }
        .modal h2 { font-size: 16px; margin: 2px 0 10px; }
        .modal p { margin: 0; line-height: 1.7; }
        .modal-actions { border-top: 1px solid #dedede; display: flex; justify-content: flex-end; gap: 10px; margin-top: 22px; padding-top: 13px; }
        .help-box { margin-bottom: 14px; }
        .help-box h2 { font-size: 14px; margin: 0 0 10px; }
        .steps { margin: 0; padding: 0; list-style: none; }
        .steps li { display: flex; gap: 10px; align-items: flex-start; margin: 9px 0; }
        .num { border: 1px solid #c9c9c9; background: #fff; padding: 2px 6px; color: #001b3f; }
        .profile { display: grid; grid-template-columns: 150px 12px 1fr; gap: 8px 0; margin-top: 10px; align-items: start; }
        .profile strong { font-weight: 700; }
        .profile .colon { text-align: center; }
        @media (max-width: 760px) {
            .app { margin: 0; border-left: 0; border-right: 0; }
            .nav { height: auto; flex-wrap: wrap; padding: 12px; }
            .nav-links { order: 3; flex-basis: 100%; }
            .cards, .info-grid, .form-grid { grid-template-columns: 1fr; }
            .profile { grid-template-columns: 125px 12px 1fr; }
            .filters { grid-template-columns: 1fr; }
            .table-wrap { overflow-x: auto; }
            .table-footer, .detail-head { align-items: stretch; flex-direction: column; gap: 10px; }
        }
    </style>
</head>
<body>
    <div class="app">
        <nav class="nav">
            <a class="brand" href="{{ route('products.index') }}">Frozeria <span>Stok</span></a>
            <div class="nav-links">
                <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">Dashboard</a>
                <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}">Kategori</a>
                <a class="nav-link {{ request()->routeIs('help') ? 'active' : '' }}" href="{{ route('help') }}">Bantuan</a>
            </div>
            @yield('nav-action')
        </nav>
        <main class="content">
            @if (session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="errors">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <div class="modal-backdrop" id="deleteModal">
        <div class="modal">
            <div class="modal-body">
                <div class="modal-icon">!</div>
                <div>
                    <h2 id="deleteTitle">Hapus barang?</h2>
                    <p id="deleteMessage">Data akan dihapus secara permanen dari sistem. Tindakan ini tidak dapat dibatalkan.</p>
                </div>
            </div>
            <form method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-actions">
                    <button type="button" class="btn" data-modal-close>Batal</button>
                    <button type="submit" class="btn btn-red">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        const title = document.getElementById('deleteTitle');
        const message = document.getElementById('deleteMessage');

        document.querySelectorAll('[data-delete-url]').forEach((button) => {
            button.addEventListener('click', () => {
                form.action = button.dataset.deleteUrl;
                title.textContent = button.dataset.deleteTitle || 'Hapus barang?';
                message.innerHTML = button.dataset.deleteMessage || 'Data akan dihapus secara permanen dari sistem. Tindakan ini tidak dapat dibatalkan.';
                modal.classList.add('open');
            });
        });

        document.querySelectorAll('[data-modal-close]').forEach((button) => {
            button.addEventListener('click', () => modal.classList.remove('open'));
        });

        modal.addEventListener('click', (event) => {
            if (event.target === modal) modal.classList.remove('open');
        });

        document.querySelectorAll('[data-photo-input]').forEach((input) => {
            input.addEventListener('change', () => {
                const preview = document.querySelector(input.dataset.photoInput);
                const filename = document.querySelector(input.dataset.filenameTarget);
                const file = input.files && input.files[0];

                if (!file || !preview) return;

                preview.src = URL.createObjectURL(file);
                preview.hidden = false;
                const icon = preview.parentElement.querySelector('.upload-icon');
                if (icon) {
                    icon.style.display = 'none';
                }

                if (filename) {
                    filename.textContent = 'Foto dipilih: ' + file.name;
                }
            });
        });
    </script>
</body>
</html>
