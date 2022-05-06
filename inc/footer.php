<footer class="main-footer">
    <strong><a href="">B1910205 - Lê Thành Đạt , B1910202 - Phạm Đoàn Trùng Dương </a>- Đồ án Quản trị dữ liệu - CT467 Nhóm 03</strong>
</footer>

</div>
</header>

<!-- jQuery -->
<script src="./public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="./public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./public/plugins/jszip/jszip.min.js"></script>
<script src="./public/plugins/pdfmake/pdfmake.min.js"></script>
<script src="./public/plugins/pdfmake/vfs_fonts.js"></script>
<script src="./public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="./public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>

<!-- AdminLTE App -->
<script src="./public/js/adminlte.min.js"></script>

<!-- SWEETALERT2 JS -->
<script src="public/js/sweetalert2.min.js"></script>

<!-- JJquery Validate -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="./public/js/jquery.validate.js"></script>



<script>
    $(function() {
        $("#main-table").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#main-table_wrapper .col-md-6:eq(0)');
    });
    $(function() {
        $("#order-table").DataTable({
            "order": [
                [0, "desc"]
            ],
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#order-table_wrapper .col-md-6:eq(0)');
    });
</script>

<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function() {
            form.submit();
        }
    })
    $(document).ready(function() {
        $("#createCustomer").validate({
            rules: {
                kh_name: "required",
                kh_address: "required",
                kh_phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                },
            },
            messages: {
                kh_name: "*Vui lòng nhập họ tên!",
                kh_address: "*Vui lòng nhập địa chỉ!",
                kh_phone: {
                    required: "*Vui lòng nhập số điện thoại!",
                    minlength: "*Số điện thoại phải gồm 10 số!",
                    maxlength: "*Số điện thoại phải gồm 10 số!",
                }
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.addClass("invalid-feedback");
                $(".invalid-feedback").css("font-style", "italic")
                error.insertAfter(element)
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid")

            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid")
            },
        })
    })
    $(document).ready(function() {
        $("#createStaff").validate({
            rules: {
                nv_name: "required",
                nv_role: "required",
                nv_gender: "required",
                nv_birth: "required",
                nv_work: "required",
                nv_address: "required",
                nv_role: "required",
                nv_pay: "required",
                nv_phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                },
            },
            messages: {
                nv_name: "*Vui lòng nhập họ tên!",
                nv_role: "*Vui lòng chọn chức vụ!",
                nv_gender: "*Vui lòng chọn giới tính!",
                nv_birth: "*Vui lòng chọn ngày sinh!",
                nv_work: "*Vui lòng chọn ngày làm việc!",
                nv_address: "*Vui lòng nhập địa chỉ!",
                nv_phone: {
                    required: "*Vui lòng nhập số điện thoại!",
                    minlength: "*Số điện thoại phải gồm 10 số!",
                    maxlength: "*Số điện thoại phải gồm 10 số!",
                },
                nv_pay: "*Vui lòng nhập lương!"
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.addClass("invalid-feedback");
                $(".invalid-feedback").css("font-style", "italic")
                error.insertAfter(element)
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid")

            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid")
            },
        })
    })
    $(document).ready(function() {
        $("#createFood").validate({
            rules: {
                food_name: "required",
                food_money: "required",
            },
            messages: {
                food_name: "*Vui lòng nhập tên món ăn!",
                food_money: "*Vui lòng nhập đơn giá!",
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.addClass("invalid-feedback");
                $(".invalid-feedback").css("font-style", "italic")
                error.insertAfter(element)
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid")

            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid")
            },
        })
    })
</script>


<?php
if (isset($_SESSION['createFoodStatusMessage']) && $_SESSION['createFoodStatusMessage'] != "") {
?>
    <script>
        Swal.fire({
            icon: '<?php echo $_SESSION['createFoodStatusCode'] ?>',
            title: '<?php echo $_SESSION['createFoodStatusMessage'] ?>',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php
    unset($_SESSION['createFoodStatusMessage']);
    unset($_SESSION['createFoodStatusCode']);
}
