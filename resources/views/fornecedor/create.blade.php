<div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <div class="bg-body-tertiary min-vh-100 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-xl-8">

                    <div class="mb-4">
                        <h1 class="h3 fw-bold text-dark mb-1">Cadastrar Novo Fornecedor</h1>
                        <p class="text-secondary mb-0">Cadastre um novo fornecedor no sistema</p>
                    </div>

                    <form wire:submit.prevent="store">
                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-body p-4 p-md-5">

                                <h5 class="card-title d-flex align-items-center gap-2 fw-semibold mb-4">
                                    <span class="d-inline-flex p-2 bg-primary-subtle text-primary rounded-3">
                                        <i class="bi bi-truck"></i>
                                    </span>
                                    Dados do Fornecedor
                                </h5>

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold d-flex align-items-center gap-1">
                                            <i class="bi bi-person text-primary"></i> Nome <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Digite o nome completo" wire:model="nome">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold d-flex align-items-center gap-1">
                                            <i class="bi bi-envelope text-primary"></i> E-mail <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" class="form-control" placeholder="fornecedor@gmail.com" wire:model="email">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold d-flex align-items-center gap-1">
                                            <i class="bi bi-telephone text-primary"></i> Telefone
                                        </label>
                                        <input type="text" class="form-control" placeholder="(11) 99999-9999" wire:model="telefone">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold d-flex align-items-center gap-1">
                                            <i class="bi bi-card-text text-primary"></i> CNPJ <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="00.000.000/0000-00" wire:model="cnpj">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-2 mt-4">
                                    <button type="button" class="btn btn-light border px-4 fw-semibold">Cancelar</button>
                                    <button type="submit" class="btn btn-primary px-4 fw-semibold">
                                        <i class="bi bi-check2-circle"></i> Cadastrar Fornecedor
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</div>
