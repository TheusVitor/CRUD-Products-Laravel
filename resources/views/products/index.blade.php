<!DOCTYPE html>
<html>

<head>
    <title>Catálogo de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
        }

        .table {
            margin-top: 20px;
        }

        .alert {
            margin-top: 20px;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        td {
            text-align: center;
        }

        .btn-actions {
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        #confirmation-modal .modal-dialog {
            margin-top: 20vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Catálogo de Produtos</h1>

        <div class="message-ajax">
        </div>

        <a href="{{ route('products.create') }}" class="btn btn-primary mt-4">Cadastrar novo produto</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade em Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>R$ {{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td class="btn-actions">
                            <a href="{{ route('products.edit', $product->id) }}"
                                class="btn btn-sm btn-primary">Editar</a>
                            <form method="POST" action="{{ route('products.destroy', $product->id) }}"
                                class="d-inline form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#confirmation-modal">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Nenhum produto cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal de confirmação de exclusão -->
    <div class="modal fade" id="confirmation-modal" tabindex="-1" aria-labelledby="confirmation-modal-label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmation-modal-label">Confirmação de exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Você tem certeza que deseja excluir o produto?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirm-delete">Excluir</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".form-delete").on("submit", function(e) {
                e.preventDefault();
                var form = this;
                $('#confirmation-modal').modal('show');
                $('#confirm-delete').on("click", function() {
                    form.submit();
                });
            });
        });
    </script>

</body>

</html>
