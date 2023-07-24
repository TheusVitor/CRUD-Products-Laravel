<!DOCTYPE html>
<html>

<head>
    <title>Editar Produto</title>
    <!-- Adicione o link para o arquivo CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 0;
        }

        .btn-primary,
        .btn-secondary {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Editar Produto</h1>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('products.update', $product->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome do produto:</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}" required
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Descrição do produto:</label>
                <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Preço do produto:</label>
                <input type="number" name="price" id="price" step="0.01" value="{{ $product->price }}"
                    required class="form-control">
            </div>

            <div class="form-group">
                <label for="quantity">Quantidade em estoque:</label>
                <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}" required
                    class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>

        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>

    <!-- Adicione o link para o arquivo JavaScript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
