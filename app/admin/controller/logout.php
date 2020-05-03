<?php

session_destroy();
header('Location:' . admin_url('signin'));
