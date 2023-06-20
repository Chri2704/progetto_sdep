<x-app-layout>
    <style>
    table {
        border-collapse: collapse;
        margin: 0 auto;
        margin-left: auto;
        margin-right: auto;
        margin-top: 1%;
        border-style: hidden;
    }

    table td {
        padding: 15px;
        border: 3px solid;
    }

    .icons {
        width: 245px;
        height: 245px;
    }
    </style>
    <table>
        <tr>
            <td>
                <a href="admin/userslist">
                    <p class="fs-4" style="text-align: center;">Lista utenti</p>
                    <img class="icons" src="images/icons/users.png" alt="users">
                </a>
            </td>
            <td>
                <a href="admin/modprod">
                    <p class="fs-4" style="text-align: center;">Modifica prodotto:</p>
                    <img class="icons" src="images/icons/items.png" alt="users">
                </a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="admin/newprod">
                    <p class="fs-4" style="text-align: center;">Nuovo prodotto</p>
                    <img class="icons" src="images/icons/new.png" alt="users">
                </a>
            </td>
        </tr>
    </table>
</x-app-layout>