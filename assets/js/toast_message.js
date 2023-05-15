function toast({
    title = '', 
    message = '', 
    type = 'info', 
    duration = 3000
}){
    const id_toast = {
        success: 'toast--success',
        info: 'toast--info',
        warning: 'toast--warning',
        danger: 'toast--danger'
    };

    const icons = {
        success: 'fas fa-check-circle',
        info: 'fas fa-info-circle',
        warning: 'fas fa-exclamation-circle',
        danger: 'fas fa-exclamation-circle'
    }

    const color_icon = {
        success: 'icon-color-success',
        info: 'icon-color-info',
        warning: 'icon-color-warning',
        danger: 'icon-color-danger'
    }

    const text = {
        success: 'text-success',
        info: 'text-info',
        warning: 'text-warning',
        danger: 'text-danger'
    }

    var toast = document.querySelector('.toast');
    toast.setAttribute('id', id_toast[type]);

    const icon = icons[type];
    const color = color_icon[type];
    const text_header = text[type];

    toast.innerHTML = `
        <div class="toast-header">
            <i class="${icon}" id="${color}"></i>
            <strong class="mr-auto text-primary ${text_header}" style="width:200px; white-space: normal;">${title}</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body">
            ${message}
        </div>
    `
    $('.toast').toast('show');
    setTimeout(function(){
        $('.toast').toast('hide');
    }, duration);
}

function showSuccessSignUpToast (){
    toast({
        title: 'Thành công!',
        message: 'Bạn đã đăng kí thành công tài khoản',
        type: 'success',
        duration: 3000
    });
}
function showErrorSignUpToast (){
    toast({
        title: 'Thất bại!',
        message: 'Email đã được sử dụng để đăng kí xin mời đăng kí lại',
        type: 'danger',
        duration: 3000
    });
}
function showWelcome(){
    toast({
        title: 'Chào mừng!',
        message: 'Chào mừng bạn quay trở lại',
        type: 'success',
        duration: 3000
    });
}
function showErrorLogin(){
    toast({
        title: 'Lỗi!',
        message: 'Email đăng nhập hoặc mật khẩu không đúng',
        type: 'danger',
        duration: 3000
    });
}
function showDeleteOrder(){
    toast({
        title: 'Xóa đặt hàng!',
        message: 'Bạn đã xóa đặt hàng thành công',
        type: 'info',
        duration: 3000
    });
}
function showDeleteProduct(){
    toast({
        title: 'Thành công!',
        message: 'Bạn đã xóa sản phẩm thành công',
        type: 'info',
        duration: 3000
    });
}
function showDeleteAccount(){
    toast({
        title: 'Thành công!',
        message: 'Bạn đã xóa tài khoản thành công',
        type: 'info',
        duration: 3000
    });
}

function showSuccessOrder(){
    toast({
        title: 'Thành công!',
        message: 'Bạn đã đặt hàng thành công. Bạn có thể vào lịch sử để xem đơn đặt hàng của mình.',
        type: 'success',
        duration: 3000
    });
}
function showErrorOrder(){
    toast({
        title: 'Thất bại!',
        message: 'Đặt hàng không thành công. Có vẻ như số lượng hàng không đủ cho yêu cầu của bạn.',
        type: 'info',
        duration: 3000
    });
}

