# Usage

```twig
<form method="post" target="_blank">
    {{ csrfInput() }}
    {{ actionInput('squeeze/download') }}
    
    <input type="hidden" name="archivename" value="archive">
    <input type="checkbox" name="files[]" value="10"><!-- asset id -->
    <input type="checkbox" name="files[]" value="20"><!-- asset id -->
    <input type="submit" value="Download!">
</form>
```

To trigger download via url you can use:
```
/actions/squeeze/download?archivename=archive&files[]=10&files[]=20
```
