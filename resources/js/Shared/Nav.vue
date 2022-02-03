<template>
    <nav class="ml-6">
        <ul class="flex">
            <li>
                <NavLink href="/inertia/home" :active="$page.component === 'Home'">
                    Home
                </NavLink>
            </li>

            <li>
                <NavLink href="/inertia/users" :active="$page.component === 'Users'">
                    Users
                </NavLink>
            </li>

            <li>
                <NavLink href="/inertia/settings" :active="$page.component === 'Settings'">
                    Settings
                </NavLink>
            </li>

<!--            <li><NavLink href="/inertia/logout" class="text-blue-500 hover:underline" method="post" as="button">Log out</Navlink></li>-->
        </ul>
    </nav>
</template>

<script>
import NavLink from './NavLink';

export default {
    components: { NavLink },
}
</script>

