<x-app-layout>
    <style>
    table {
        border-collapse: collapse;
        margin: 0 auto;
        margin-left: auto;
        margin-right: auto;
        margin-top: auto;
        border-style: hidden;
    }
    table td {
        padding: 15px;
        border: 3px solid;
      }
    .icons {
        width: 300px;
        height: 300px;
    }
    </style>
    <table>
      <tr>
        <td><a href="admin/userslist"><img class="icons" src="images/icons/users.png" alt="users"></a></td>
        <td><a href="admin/modprod"><img class="icons" src="images/icons/items.png" alt="users"></a></td>
      </tr>
      <tr>
      <td><a href="admin/newprod"><img class="icons" src="images/icons/new.png" alt="users"></a></td>
      <td><a href="admin/orders"><img class="icons" src="images/icons/orders.png" alt="Ordini fatti?!"></a></td>
      </tr>
    </table>
</x-app-layout>