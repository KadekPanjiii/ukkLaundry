<?php

class FlashMessage extends Connection{
        public static function setFlashMessage($status, $message) {
        unset($_SESSION["flashMessage"]);
        $_SESSION["flashMessage"] = [
            "status" => $status,
            "message" => $message
        ];
    }

        public static function flashMessage() {
        if(isset($_SESSION["flashMessage"])) {
            echo "<script>
                Swal.fire({
                    icon: '" . $_SESSION["flashMessage"]["status"] . "',
                    title: '" . $_SESSION["flashMessage"]["message"] . "',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
            </script>";
            unset($_SESSION["flashMessage"]);
        }
    }
}