<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch API Demo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
    
    </div>
    <script>
        fetch('https://www.receitaws.com.br/v1/cnpj/27865757000102')
        .then(response => response.text())
        .then(data => console.log(data));
        async function renderUsers() {
        let users = await getUsers();
        let html = '';
        users.forEach(user => {
        let htmlSegment = `<div class="user">
                            <img src="${user.profileURL}" >
                            <h2>${user.firstName} ${user.lastName}</h2>
                            <div class="email"><a href="email:${user.email}">${user.email}</a></div>
                        </div>`;

        html += htmlSegment;
    });
    
    async function getUsers() {
    let url = 'users.json';
    try {
        let res = await fetch(url);
        return await res.json();
    } catch (error) {
        console.log(error);
    }
}

    let container = document.querySelector('.container');
    container.innerHTML = html;
}

renderUsers();
    </script>
</body>
</html>