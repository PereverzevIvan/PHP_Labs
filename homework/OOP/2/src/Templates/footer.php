            </td>
            <td width="300px" class="sidebar">
                <div class="sidebarHeader">Меню</div>
                <ul>
                    <li><a href="/PHP_Labs/homework/OOP/2/">Главная страница</a></li>
                    <?= !empty($user) ? "<li><a href='/PHP_Labs/homework/OOP/2/articles/create'>Создать статью</a></li>" : '' ?>
                </ul>
            </td>
            </tr>
            <tr>
                <td class="footer" colspan="2">Все права защищены (c) Мой блог</td>
            </tr>
        </table>
    </body>
</html>