
function toast({
    title = '',
    message = '',
    type = '',
    duration = 2000
}) {
    const toasts = document.getElementById('toasts');
    const icons = {
        success: 'fas fa-check-circle',
        warning: 'fas fa-exclamation-circle',
        fail: 'fa-solid fa-triangle-exclamation'
    };
    const icon = icons[type];
    const toast = document.createElement('div');
    toast.classList.add('toast', `${type}`);
    toast.innerHTML = `
    <div><i class="i ${icon}"></i></div>
    <div class="text">
        <p class="p1">${title}</p>
        <p class="p2">${message}</p>
    </div>
    <div class="close"><i class="fa-solid fa-xmark"></i></div>
    `;

    const removetimeout = setTimeout(() => {
        toasts.removeChild(toast);
    }, duration);

    toast.onclick = function (e) {
        if (e.target.closest('.close')) {
            toasts.removeChild(toast);
            clearTimeout(removetimeout);
        }
    }

    toasts.appendChild(toast);
}

// loading

function load(bool) {
    let loading = document.getElementById('loading');
    if (bool == 1) {
        loading.style.display = 'block';
    } else {
        loading.style.display = 'none';
    }
}


// comfirm 


function myconfirm(title) {
    return new Promise((resolve, reject) => {
        const comfirm = document.getElementById('dvoverlayconfirm');
        const formconfirm = comfirm.querySelector('.form-confirm');
        comfirm.classList.add('active');
        comfirm.querySelector('.from-confirm-title').textContent = title;

        const clickoutside = (e) => {
                if (!formconfirm.contains(e.target)) {
                comfirm.classList.remove('active');
                resolve(false);
                cleanclick();
            }
        }

        const clickyes = (e) => {
            comfirm.classList.remove('active');
            resolve(true);
            cleanclick();
            e.stopPropagation();
        }

        const clickno = () => {
            comfirm.classList.remove('active');
            resolve(false);
            cleanclick();
        }


        const cleanclick = () => {
            comfirm.removeEventListener('click', clickoutside);
            comfirm.querySelector('#dvbtnyes').removeEventListener('click', clickyes);
            comfirm.querySelector('#dvbtnno').removeEventListener('click', clickno);
        }

        comfirm.addEventListener('click',clickoutside);
        comfirm.querySelector('#dvbtnyes').addEventListener('click', clickyes);
        comfirm.querySelector('#dvbtnno').addEventListener('click',clickno);
    

        
    });
}



function format(number) {
    return Number(number).toLocaleString();
}