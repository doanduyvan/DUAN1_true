<!DOCTYPE html>
<html lang="en">

<head>
	<base href="<?= WEB_ROOT ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/admin/output.css">
    <link rel="stylesheet" href="public/css/ck.css">
    <link rel="stylesheet" href="public/css/toast_loading.css">
    <script src="public/js/toast_loading.js"></script>
</head>

<body>
    <!-- toast -->
    <div id="toasts"></div>
    <!-- loading -->
    <div class="loading" id="loading">
        <div class="load">
            <div class="load1">
                <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
                    <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 660" stroke-dashoffset="-330" stroke-linecap="round"></circle>
                    <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 220" stroke-dashoffset="-110" stroke-linecap="round"></circle>
                    <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
                    <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
                </svg>
            </div>
        </div>
    </div>


    <main class="w-full max-w-screen-2xl mx-auto">

        <div class="fixed left-0 top-0 bottom-0 w-[300px] bg-[#287884] text-white">
            <!-- info -->
            <div class="flex items-center gap-[10px] px-[10px] py-[20px]">
                <div class="w-[60px]"><img class="w-full aspect-square rounded-[50%] object-cover" src="public/img/avatar-default.png" alt=""></div>
                <div class="flex-1">
                    <p class="font-bold"><?= strtoupper($_SESSION['accountAdmin']['name']) ?></p>
                    <p class="text-gray-300 text-[14px]">Admin</p>
                </div>
            </div>

            <!-- menu -->
            <div class="scroll w-full max-h-[50%]">
                <ul class="menu_ul">
                    <li class="<?= isset($currentMenu) && $currentMenu == 1 ? "active" : "" ?>"><a href="admin/dashboard">Dashboard</a></li>
                    <li class="<?= isset($currentMenu) && $currentMenu == 2 ? "active" : "" ?>"><a href="admin/category">Category</a></li>
                    <li class="<?= isset($currentMenu) && $currentMenu == 3 ? "active" : "" ?>"><a href="admin/brand">Brands</a></li>
                    <li class="<?= isset($currentMenu) && $currentMenu == 4 ? "active" : "" ?>"><a href="admin/products">Products</a></li>
                    <li class="<?= isset($currentMenu) && $currentMenu == 5 ? "active" : "" ?>"><a href="admin/order">Orders</a></li>
                </ul>
            </div>

            <!-- fix info -->

            <div class="">
                <div class="border-t border-gray-400 mx-[10px]"></div>
                <ul class="fix_info">
                    <li class="mt-[10px] px-[20px]"><a class="block p-[10px]" href="">My Profile</a></li>
                    <li class="px-[20px]"><a class="block p-[10px]" href="admin/auth/signout">Log Out</a></li>

                </ul>
            </div>

        </div>
        <div class="flex">
            <div class="flex-1 ml-[300px]">