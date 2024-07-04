<!DOCTYPE html>
<html>
<head>
    <title>Liste du Personnel de la Cour Suprême</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }
        .content {
            margin: 0 20px;
            line-height: 1.6;
        }
        .footer {
            left: 0;
            bottom: 50px;
            width: 100%;
            background-color: #f8f9fa;
            color: black;
            text-align: center;
        }
        table {
        width: 100%;
        border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        thead { display: table-row-group; }
    </style>
</head>
<body>
<div class="header">
    <h2>Liste du Personnel de la Cour Suprême</h2>
</div>

<div class="content">
    <table class="table mb-0 text-left table-striped table-bordered">
        <thead>
            <tr>
                <th>N°</th>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénoms</th>
                <th>Corps</th>
                <th>Structure</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($personnels as $personnel)
                <tr>
                    <td class="cell"><span class="truncate">{{$personnel->id}}</span></td>
                    <td class="cell">{{$personnel->matricule}}</td>
                    <td class="cell">{{$personnel->nom}}</td>
                    <td class="cell">{{$personnel->prenoms}}</td>
                    <td class="cell">{{$personnel->corps}}</td>
                    <td class="cell">{{$personnel->structure->designation}}</td>
                </tr>
            @empty
                <div class="col alert alert-warning">
                    Aucun personnel trouvé !!
                </div>
            @endforelse

        </tbody>
    </table>
</div>

<div class="footer">
    <p>Ce document est généré le {{ date("d-m-Y") }}</p>
</div>
</body>
</html>
