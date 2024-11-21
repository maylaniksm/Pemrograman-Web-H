<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/index.css">

</head>
<body style="display: flex; align-items: center; justify-content: center; min-height: 100vh; background-color: #f3f4f6;">
    <div style="width: 100%; max-width: 24rem; padding: 1.5rem; background-color: #ffffff; border-radius: 0.5rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <h2 style="margin-bottom: 1.5rem; font-size: 1.5rem; font-weight: bold; text-align: center; color: #374151;">Login</h2>
        <form action="<?= BASEURL ?>/authcontroller/login" method="post">
            <div style="margin-bottom: 1rem;">
                <label for="username" style="display: block; margin-bottom: 0.5rem; font-size: 0.875rem; font-weight: 500; color: #4b5563;">Username:</label>
                <input type="text" name="username" id="username" style="width: 100%; padding: 0.5rem 0.75rem; color: #374151; border: 1px solid #d1d5db; border-radius: 0.375rem; outline: none; transition: border-color 0.2s; box-sizing: border-box;" onfocus="this.style.borderColor='#3b82f6'" onblur="this.style.borderColor='#d1d5db'" required>
            </div>
            <div style="margin-bottom: 1rem;">
                <label for="password" style="display: block; margin-bottom: 0.5rem; font-size: 0.875rem; font-weight: 500; color: #4b5563;">Password:</label>
                <input type="password" name="password" id="password" style="width: 100%; padding: 0.5rem 0.75rem; color: #374151; border: 1px solid #d1d5db; border-radius: 0.375rem; outline: none; transition: border-color 0.2s; box-sizing: border-box;" onfocus="this.style.borderColor='#3b82f6'" onblur="this.style.borderColor='#d1d5db'" required>
            </div>
            <div style="margin-bottom: 1rem;">
                <button type="submit" style="width: 100%; padding: 0.5rem 1rem; font-weight: bold; color: #ffffff; background-color: #3b82f6; border: none; border-radius: 0.375rem; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#2563eb'" onmouseout="this.style.backgroundColor='#3b82f6'">Login</button>
            </div>
            <?php if (isset($data['error'])): ?>
                <p style="font-size: 0.875rem; text-align: center; color: #ef4444;"><?= $data['error'] ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
