# AvatarNetworkScript
2D Avatar Network Script

LICENSED UNDER CREATIVE COMMONS IN LICENSE

Preview: https://ans.net/demo/
Basics of an avatar network script in PHP.
I made the basics of the installer and I'd like to have other people work on this.

Feel free to fork and make improvements. If they help I will push your changes.

The goal:
Create an installation that uses inputs and creates a proper avatar application.

```php
<?php
$file = 'source.php';
$current = file_get_contents($file);
$current .= "<?php echo 'Hello world!';?>";
// Write the contents back to the file
file_put_contents($file, $current);
?>
```
