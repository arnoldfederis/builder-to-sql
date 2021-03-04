## Laravel Builder to SQL

## Description
Render Eloquent or Query builder to Sql

## Compatibility
`Laravel 5 to latest version` 

`PHP ^7.0`

## How to install
```
composer require arnoldfederis/builder-to-sql
```

## How to use
Import BuilderToSql class or use the helper function.
```phpt

class TestController extends Controller
{
    public function index()
    {
        /* Class base */
        // Query Builder
        return BuilderToSql::render(DB::table('users')->where('email', 'query_builder_to_sql@email.com')->orderByDesc('created_at'));
        
        // Eloquent Builder
        return BuilderToSql::render(User::where('email', 'query_builder_to_sql@email.com')->orderByDesc('created_at'));
        
        /* Function base */
        // Query Builder
        return query_builder_to_sql(DB::table('users')->where('email', 'query_builder_to_sql@email.com')->orderByDesc('created_at'));
        
        // Eloquent Builder
        return query_builder_to_sql(User::where('email', 'query_builder_to_sql@email.com')->orderByDesc('created_at'));
        
        // Result
        // select * from users where email = 'query_builder_to_sql@email.com' order by created_at desc
    }
}
```

## License
This is a free software licensed under the [MIT license](http://opensource.org/licenses/MIT).
