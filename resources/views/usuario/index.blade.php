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

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">

                    <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
                        <div>
                            <h1 class="h5 fw-bold text-dark mb-1">Gerenciamento de Usuários</h1>
                            <p class="text-secondary mb-0">Usuários cadastrados no sistema</p>
                        </div>
                        <a href="{{ route('usuario.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2 px-3 fw-semibold">
                            <i class="bi bi-person-plus"></i> Adicionar Usuário
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr class="text-secondary text-uppercase small">
                                    <th class="fw-semibold">Nome</th>
                                    <th class="fw-semibold">E-mail</th>
                                    <th class="fw-semibold">Perfil</th>
                                    <th class="fw-semibold">Departamento</th>
                                    <th class="fw-semibold">Cadastro</th>
                                    <th class="fw-semibold text-end">Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($usuarios as $u)
                                    <tr>
                                        <td class="fw-semibold text-dark">{{ $u->nome }}</td>
                                        <td>
                                            <a href="mailto:{{ $u->email }}" class="text-primary text-decoration-none">{{ $u->email }}</a>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-primary-subtle text-primary-emphasis fw-semibold">{{ $u->perfil->nome ?? '—' }}</span>
                                        </td>
                                        <td>{{ $u->departamento }}</td>
                                        <td class="text-secondary">{{ \Carbon\Carbon::parse($u->data_hora)->format('d/m/Y H:i') }}</td>
                                        <td class="text-end text-nowrap">
                                            <a href="{{ route('usuario.edit', ['id' => $u->id]) }}" class="btn btn-light btn-sm border fw-semibold">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <button class="btn btn-light btn-sm border fw-semibold text-danger"
                                                wire:click="delete({{ $u->id }})" wire:confirm="Deseja excluir o usuário?">
                                                <i class="bi bi-trash"></i> Excluir
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</div>
