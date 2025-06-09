<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListaAlugueis</title>
    <link rel="stylesheet" href="../../components/style-listarAlugueis.css">
</head>
<body>
    <div>
    <form>
    <label for="nome"></label>
        <h1 class="cabeçalho">Alugueis</h1>
      <input type="text" id="nome" name="nome" placeholder="Nome do usuário">
     <a href="#" class="buscarAlu">Buscar </a>
    </form>    
    <h1></h1>
        <table>
            <thead>
                <tr>
                <th class="tnomeUsuario">Nome do usuario</th>
                <th class="tdata">Data aluguel</th>
                <th>Baixar aluguel</th>
                </tr>
                </thead>
                <tbody>
                <br><br>
                <tr>
                    <td>João</td>
                    <br></br>
                    <td>dwaddaw</td>
                    <br></br>
                    <td><a href="#" class="baixarAlu">Baixar</a></tr>
                    
                </tr>
            </tbody>
        </table>
</div>
</body>
</html>