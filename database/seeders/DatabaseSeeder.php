<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()
            ->create([
                'name' => 'Niku Nitin',
                'email' => 'test@example.com',
                'password' => 'secret'
            ]);

        $this->createPosts($user);

        User::factory()
            ->count(5)
            ->hasPosts(10)
            ->create();
    }

    private function createPosts(User $user) {
        Post::factory()
            ->for($user)
            ->create([
                'title' => 'Code splitting for optimising bundle size',
                'content' => "
                        Code splitting is a technique to split larger javascript bundle into smaller chunks to improve performance. Loading only the necessary code when needed rather than loading everything upfront improves performance of web applications.<br><br>

                        Code splitting typically involves:
                        <ol class='list-decimal'>
                        <li>Dynamic imports, where we can dynamically import components using 'import()'. This creates seperate chunks for those modules and thus decreasing intial load time.</li>
                        <li>Lazy loading routes and their components.</li>
                        <li>Separating vendor specific code in separate chunks making it easier for browser to cache them as they don't change frequently with the app.</li>
                        </ol>
                "
            ]);

        Post::factory()
            ->for($user)
            ->create([
                'title' => 'Code bundling. If the target browser in modern, can we skip it?',
                'content' => "Technically yes, we can skip code bundling if we are targetting only mordern browsers. But we will lose the benefits of bundling such as tree shaking which removed unused and dead code from the bundle. Bundlers also minifies the code which reduces their size and hence decrease the load time. And by skipping code bundling we will be missing code splitting and lazy loading of components which increses performance of our app."
            ]);

        Post::factory()
            ->for($user)
            ->create([
                'title' => 'Are there any challenges to worry about when building a multi-lingual application?',
                'content' => "
                    There are multiple challenges thet we need to be aware of when building a multi-lingual application.
                    <ol class='list-decimal'>
                    <li>Different languages can have varying lengths for the same text. This can affect layout and design of our application.</li>
                    <li>Languages like Arabic are written from right to left (RTL). In such cases we need to make CSS  and layout adjustments to ensure proper alignment and readability.</li>
                    <li>Some words may not have direct translations and require contextual understanding which is a major challenge.</li>
                    <li>Different languages and regions have different format to display date and time.</li>
                    </ol>
                "
            ]);

        Post::factory()
            ->for($user)
            ->create([
                'title' => "We're getting 502 Bad Gateway error when using the 'remember_me' token while logging in",
                'content' => "The remember_me functionality heavily relies on session management. If 'SESSION_DRIVER' is misconfigured or has issues then it can lead to 502 server error. However to find exactly what is the issue, we need to check laravel logs for a more detailed error message and stack trace."
            ]);
    }
}
