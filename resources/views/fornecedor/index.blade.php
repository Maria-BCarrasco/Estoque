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
                    @php
                        $pont = (int) ($f->pontualidade ?? 0);
                        $perf = $pont >= 90 ? ['Excelente', 'success'] : ($pont >= 75 ? ['Bom', 'warning'] : ['Regular', 'danger']);
                    @endphp
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">

                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-building text-primary fs-4"></i>
                                        <h5 class="fw-bold text-dark mb-0">{{ $f->nome }}</h5>
                                    </div>
                                    <span class="badge bg-warning-subtle text-warning-emphasis d-inline-flex align-items-center gap-1 px-2 py-1 fs-6">
                                        <i class="bi bi-star-fill text-warning"></i> {{ number_format($f->avaliacao ?? 0, 1) }}
                                    </span>
                                </div>

                                <p class="text-secondary mb-3">CNPJ: {{ $f->cnpj }}</p>

                                <div class="d-flex align-items-center gap-2 mb-2 text-dark">
                                    <i class="bi bi-telephone text-secondary"></i>
                                    <span>{{ $f->telefone ?: '—' }}</span>
                                </div>
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <i class="bi bi-envelope text-secondary"></i>
                                    <a href="mailto:{{ $f->email }}" class="text-primary text-decoration-none">{{ $f->email }}</a>
                                </div>

                                <hr class="my-3">

                                <div class="row text-center g-0 mb-3">
                                    <div class="col-4">
                                        <i class="bi bi-box-seam text-primary fs-5 d-block mb-1"></i>
                                        <div class="fw-bold fs-5 text-dark">{{ $f->pedidos ?? 0 }}</div>
                                        <div class="text-secondary small">Pedidos</div>
                                    </div>
                                    <div class="col-4">
                                        <i class="bi bi-truck text-success fs-5 d-block mb-1"></i>
                                        <div class="fw-bold fs-5 text-dark">{{ $f->prazo_medio ?? '—' }}</div>
                                        <div class="text-secondary small">Prazo Médio</div>
                                    </div>
                                    <div class="col-4">
                                        <i class="bi bi-circle-fill text-{{ $perf[1] }} fs-5 d-block mb-1"></i>
                                        <div class="fw-bold fs-5 text-dark">{{ $pont }}%</div>
                                        <div class="text-secondary small">Pontualidade</div>
                                    </div>
                                </div>

                                <hr class="my-3">

                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-semibold text-dark">Performance Geral</span>
                                    <span class="fw-bold text-{{ $perf[1] }}">{{ $perf[0] }}</span>
                                </div>
                                <div class="progress mb-4" role="progressbar" aria-valuenow="{{ $pont }}" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-{{ $perf[1] }}" style="width: {{ $pont }}%"></div>
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-light border w-50 fw-semibold">Ver Histórico</button>
                                    <button type="button" class="btn btn-light border w-50 fw-semibold">Novo Pedido</button>
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
