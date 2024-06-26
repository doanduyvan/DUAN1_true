<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= WEB_ROOT ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/admin/output.css">
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

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <!-- <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company"> -->
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in Admin</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="#" id="form_signin">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="px-[15px] block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="px-[15px] block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                        in</button>
                </div>
            </form>
          
        </div>
    </div>

    <div id="rememberpass" class="hidden">
        <div class="fixed inset-0 grid place-content-center backdrop-blur-[5px]">
            <form action="" class="">
                <div class="p-[40px] rounded-[10px] bg-white shadow w-[400px] text-center relative">
                    <div class="absolute top-[-15px] right-[-15px] cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512"><path fill="#000000" d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/></svg>
                    </div>
                    <label for="" class="font-medium mb-[20px] inline-block text-[22px]">Confirm Code</label>
                    <input type="number" name="comfirmcode" id="" placeholder="Confirm Code"
                        class="px-[15px] block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <input type="submit" value="Submit" class="bg-indigo-600 mt-[20px] text-white leading-[35px] px-[20px] rounded-[5px] cursor-pointer inline-block">
                    <p class="text-red-400 mt-[25px]">Mã xác nhận không đúng!</p>
                </div>
            </form>
        </div>
    </div>

    <script>

        const form = document.getElementById('form_signin');

        form.addEventListener('submit',function(e){
            e.preventDefault();
            const formData = new FormData(form);

            load(1);
            fetch('admin/auth/signinpost',{
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                load(0);
                if(data.status == 1){
                    toast({
                        title: 'Success',
                        message: data.message,
                        type: 'success',
                        duration: 3000
                    });

                    let currentUrl = window.location.href;
                    setTimeout(() => {
                        window.location.href = currentUrl;
                    }, 1000);
                }else{
                    toast({
                        title: 'Error',
                        message: data.message,
                        type: 'fail'
                    });
                }
            })
            .catch(error => {
                load(0);
                toast({
                    title: 'Error',
                    message: error.message,
                    type: 'fail'
                });
                console.log(error);
            });

            // console.log(...formData);
        });

    </script>

</body>

</html>