@props([ "active" => false, "href" ])

<a href="{{$href}}" class="{{'me-4 px-4 py-3 rounded' . ($active ? " bg-zinc-900 text-white" : '')}}">{{$slot}}</a>
