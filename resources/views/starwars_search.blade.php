<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars People Search</title>
    <style>
      html {
        padding: 30px;
      }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            margin-bottom: 5px;
        }
        ul li a {
            color: blue;
            text-decoration: none;
        }
        ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Star Wars People Search</h1>

    <form action="{{ url('/starwars-search') }}" method="GET">
        <label for="search">Search People:</label>
        <input type="text" name="search" id="search">
        <button type="submit">Search</button>
    </form>

    @if (isset($people) && count($people) > 0)
        <ul class="search-results">
            @foreach ($people as $person)
                <li>
                  <h1>{{ $person->name }}</h1>
                    @foreach ($person as $key => $value)
                      @if (!is_array($value))
                            @if ($key !== 'name')
                                <li><b>{{ $key }}:</b>
                                    @if (Str::startsWith($value, ['http://', 'https://']))
                                        <a href="{{ $value }}" target="_blank">{{ $value }}</a>
                                    @else
                                        {{ $value }}
                                    @endif
                                </li>
                            @endif
                        @else
                            <li><b>{{ $key }}:</b>
                                <ul>
                                    @foreach ($value as $item)
                                          @if (Str::startsWith($item, ['http://', 'https://']))
                                              <li><a href="{{ $item }}" target="_blank">{{ $item }}</a></li>
                                          @else
                                              <li>{{ $item }}</li>
                                          @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                </li>
                <br />
                <hr />
            @endforeach
        </ul>
    @else
        <br><p>No results found. Please try again.</p>
    @endif
</body>
</html>
