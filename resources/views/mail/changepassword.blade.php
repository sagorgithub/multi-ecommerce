<x-mail::message>
# Change Password Confermetion -{{ $user_name_for_mail }}

Your order has been shipped!

<x-mail::button :url="$url">
TEXT BUTTON
</x-mail::button>

<x-mail::panel>
This is the panel content.
</x-mail::panel>

<x-mail::table>
| Laravel       | Table         | Example       |
| ------------- | :-----------: | ------------: |
| Col 2 is      | Centered      | $10           |
| Col 3 is      | Right-Aligned | $20           |
</x-mail::table>

Thanks,<br>
{{ config('app.name') }}

<br><br>
Click Hear My Link: <a href="sagor.com">sagor</a>
</x-mail::message>
