<?php

class Flasher {
    public static function setFlash($pesan, $aksi, $type) {
        $_SESSION['flash'] = [
            "pesan" => $pesan,
            "aksi" => $aksi,
            "type" => $type,
        ];
    }

    public static function flash() {
        if (isset($_SESSION['flash'])) {
            echo "
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        swal({
                            icon: '" . $_SESSION['flash']['type'] . "',
                            title: '" . $_SESSION['flash']['aksi'] . "',
                            text: '" . $_SESSION['flash']['pesan'] . "'
                        })
                    })
                </script>
            ";
            unset($_SESSION['flash']);
        }
    }
}