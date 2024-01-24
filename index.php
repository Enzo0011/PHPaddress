<!DOCTYPE html>
<html>
<head>
    <title>Recherche d'Adresses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            margin-right: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        button {
            padding: 10px 15px;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        #results {
            margin-top: 20px;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <form id="searchForm">
        <input type="text" id="searchQuery" placeholder="Entrez votre recherche...">
        <button type="submit">Rechercher</button>
    </form>
    
    <div id="results"></div>

    <script>
        document.getElementById('searchQuery').addEventListener('input', function() {
            var query = this.value;
            if (query.length >= 4) {
                fetch('search.php?query=' + encodeURIComponent(query))
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('results').innerHTML = data;
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                document.getElementById('results').innerHTML = "";
            }
        });

        document.getElementById('searchForm').addEventListener('submit', function(e) {
            e.preventDefault();
        });
    </script>
</body>
</html>