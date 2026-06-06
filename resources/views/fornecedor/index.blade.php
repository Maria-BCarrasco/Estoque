<div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <div class="bg-body-tertiary min-vh-100 py-5">
        <div class="container">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @endif

            <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
                <div>
                    <h1 class="h4 fw-bold text-dark mb-1">Fornecedores</h1>
                    <p class="text-secondary mb-0">Fornecedores cadastrados no sistema</p>
                </div>
                <a href="{{ route('fornecedor.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2 px-3 fw-semibold">
                    <i class="bi bi-plus-lg"></i> Novo Fornecedor
                </a>
            </div>

            <div class="row g-4">
                @foreach ($fornecedores as $f)
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">

                                <div class="d-flex justify-content-between align-items-start gap-2 mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-building text-primary fs-4"></i>
                                        <h5 class="fw-bold text-dark mb-0">{{ $f->nome }}</h5>
                                    </div>
                                    <div class="d-flex gap-2 text-nowrap">
                                        <a href="{{ route('fornecedor.edit', ['id' => $f->id]) }}" class="btn btn-light btn-sm border fw-semibold">
                                            <i class="bi bi-pencil"></i> Editar
                                        </a>
                                        <button class="btn btn-light btn-sm border fw-semibold text-danger"
                                            wire:click="delete({{ $f->id }})" wire:confirm="Deseja excluir o fornecedor?">
                                            <i class="bi bi-trash"></i> Excluir
                                        </button>
                                    </div>
                                </div>

                                <p class="text-secondary mb-3">CNPJ: {{ $f->cnpj }}</p>

                                <div class="d-flex align-items-center gap-2 mb-2 text-dark">
                                    <i class="bi bi-telephone text-secondary"></i>
                                    <span>{{ $f->telefone ?: '—' }}</span>
                                </div>
                                <div class="d-flex align-items-center gap-2 mb-0">
                                    <i class="bi bi-envelope text-secondary"></i>
                                    <a href="mailto:{{ $f->email }}" class="text-primary text-decoration-none">{{ $f->email }}</a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</div>
