<div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .usuario-create {
            min-height: 100vh;
            background: linear-gradient(135deg, #eef2ff 0%, #f8fafc 55%, #eef4ff 100%);
            padding: 48px 16px 64px;
        }

        .usuario-create .page-title {
            font-size: 1.9rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .usuario-create .page-subtitle {
            color: #94a3b8;
            margin-bottom: 0;
        }

        .usuario-create .form-card {
            border: 1px solid #eef2f7;
            border-radius: 18px;
            box-shadow: 0 18px 40px -24px rgba(15, 23, 42, 0.35);
            background: #ffffff;
        }

        .usuario-create .card-heading {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.15rem;
            font-weight: 600;
            color: #1e293b;
        }

        .usuario-create .card-heading .heading-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: #eef2ff;
            color: #0600b0;
            font-size: 1.15rem;
        }

        .usuario-create .form-label {
            font-weight: 600;
            color: #334155;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .usuario-create .form-label i {
            color: #0600b0;
        }

        .usuario-create .form-control,
        .usuario-create .form-select {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 0.95rem;
            background: #f8fafc;
            transition: border-color .15s ease, box-shadow .15s ease, background .15s ease;
        }

        .usuario-create .form-control:focus,
        .usuario-create .form-select:focus {
            border-color: #0600b0;
            background: #ffffff;
            box-shadow: 0 0 0 .2rem rgba(6, 0, 176, 0.12);
        }

        .usuario-create .info-note {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            background: #eef4ff;
            border: 1px solid #dbe4ff;
            border-radius: 12px;
            padding: 14px 16px;
            color: #475569;
            font-size: 0.9rem;
        }

        .usuario-create .info-note i {
            color: #0600b0;
            font-size: 1.05rem;
            margin-top: 1px;
        }

        .usuario-create .btn-cadastrar {
            background-color: #0600b0;
            border: none;
            color: #ffffff;
            font-weight: 600;
            border-radius: 10px;
            padding: 10px 22px;
        }

        .usuario-create .btn-cadastrar:hover {
            background-color: #04008a;
            color: #ffffff;
        }

        .usuario-create .btn-cancelar {
            background-color: #f1f5f9;
            border: 1px solid #e2e8f0;
            color: #475569;
            font-weight: 600;
            border-radius: 10px;
            padding: 10px 22px;
        }

        .usuario-create .btn-cancelar:hover {
            background-color: #e2e8f0;
            color: #1e293b;
        }
    </style>

    <div class="usuario-create">
        <div class="container" style="max-width: 860px;">

            <div class="mb-4">
                <h1 class="page-title">Adicionar Novo Usuário</h1>
                <p class="page-subtitle">Cadastre um novo usuário no sistema</p>
            </div>

            <form wire:submit.prevent="store">
                <div class="form-card p-4 p-md-5">

                    <div class="card-heading mb-4">
                        <span class="heading-icon"><i class="bi bi-person-plus"></i></span>
                        <span>Dados do Usuário</span>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-person"></i> Nome Completo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Digite o nome completo" wire:model="nome">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-envelope"></i> E-mail <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" placeholder="usuario@medstock.com" wire:model="email">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-shield-lock"></i> Perfil de Acesso <span class="text-danger">*</span></label>
                            <select class="form-select" wire:model="perfis_de_acesso_id">
                                <option value="">Selecione o perfil</option>
                                <option value="1">Administrador</option>
                                <option value="2">Gestor de Suprimentos</option>
                                <option value="3">Operador de Estoque</option>
                                <option value="4">Gestor Financeiro</option>
                                <option value="5">Farmacêutico</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-diagram-3"></i> Departamento <span class="text-danger">*</span></label>
                            <select class="form-select" wire:model="departamento">
                                <option value="">Selecione o departamento</option>
                                <option>TI</option>
                                <option>Farmácia</option>
                                <option>Almoxarifado</option>
                                <option>Financeiro</option>
                                <option>Compras</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-building"></i> Unidade Hospitalar <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Hospital Central" wire:model="unidade_hospitalar">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-telephone"></i> Telefone</label>
                            <input type="text" class="form-control" placeholder="(11) 99999-9999" wire:model="telefone">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-key"></i> Senha Temporária <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Será enviada por e-mail" wire:model="senha_temporaria">
                        </div>
                    </div>

                    <div class="info-note mt-4">
                        <i class="bi bi-info-circle"></i>
                        <span>O usuário receberá um e-mail com instruções para o primeiro acesso.</span>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <button type="button" class="btn btn-cancelar">Cancelar</button>
                        <button type="submit" class="btn btn-cadastrar">
                            <i class="bi bi-check2-circle"></i> Cadastrar Usuário
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</div>
