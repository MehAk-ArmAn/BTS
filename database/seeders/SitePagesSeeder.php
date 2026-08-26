<?php

namespace Database\Seeders;

use App\Models\SitePage;
use Illuminate\Database\Seeder;

class SitePagesSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'about',
                'type' => 'about',
                'title' => 'About BangTanSonyeondan',
                'nav_label' => 'About',
                'eyebrow' => 'ARMY HOMEBASE',
                'hero_title' => 'A fan-made BTS world for learning, exploring, and celebrating.',
                'hero_subtitle' => 'BangTanSonyeondan is a fan-made ARMY hub built for profiles, songs, learning materials, quizzes, gallery memories, BT21 characters, and interactive fan experiences.',
                'intro_title' => 'Built with love for ARMY',
                'intro_body' => 'This website is designed to help fans discover BTS content in a clean, interactive, and beautiful way while supporting official BTS channels whenever possible.',
                'content_html' => '
                    <h2>What is BangTanSonyeondan?</h2>
                    <p>BangTanSonyeondan is a fan-made educational and entertainment website created for BTS fans. It includes member profiles, songs, timeline moments, quotes, quizzes, learning pages, BT21 sections, and profile features.</p>
                    <h2>Our goal</h2>
                    <p>The goal is simple: make a beautiful ARMY space that feels organized, safe, interactive, and easy to explore.</p>
                    <ul>
                        <li>Help fans learn about BTS history and members.</li>
                        <li>Make quizzes and learning more fun.</li>
                        <li>Keep the design premium, dark, purple, and emotional.</li>
                        <li>Respect official BTS sources, artists, and copyright owners.</li>
                    </ul>
                ',
                'blocks' => [
                    ['icon' => '💜', 'title' => 'Fan-made with love', 'body' => 'Created as a BTS fan experience, not an official BTS or HYBE website.'],
                    ['icon' => '🎧', 'title' => 'Learn and explore', 'body' => 'Members, songs, quotes, timeline, quizzes, BT21, gallery, and more.'],
                    ['icon' => '✨', 'title' => 'Interactive design', 'body' => 'Built with animated pages, glass cards, glowing hover states, and ARMY-friendly layouts.'],
                ],
                'faqs' => [
                    ['question' => 'Is this an official BTS website?', 'answer' => 'No. BangTanSonyeondan is a fan-made website created for educational and entertainment purposes.'],
                    ['question' => 'Can I suggest corrections?', 'answer' => 'Yes. Use the contact page to send corrections, feedback, or content requests.'],
                ],
                'cta_label' => 'Contact Us',
                'cta_url' => '/contact',
                'meta_title' => 'About BangTanSonyeondan',
                'meta_description' => 'Learn about BangTanSonyeondan, a fan-made BTS website for ARMY.',
                'show_in_nav' => true,
                'show_in_footer' => true,
                'is_active' => true,
                'sort_order' => 10,
            ],

            [
                'slug' => 'contact',
                'type' => 'contact',
                'title' => 'Contact',
                'nav_label' => 'Contact',
                'eyebrow' => 'MESSAGE CENTER',
                'hero_title' => 'Need help, have feedback, or spotted something?',
                'hero_subtitle' => 'Send your message directly from here. Your message will be saved safely inside the admin dashboard.',
                'intro_title' => 'Contact BangTanSonyeondan',
                'intro_body' => 'Use this page for support requests, corrections, privacy questions, feedback, or collaboration messages.',
                'content_html' => '
                    <h2>Before sending</h2>
                    <p>Please include clear details so we can understand your request properly. For privacy or data deletion requests, mention the email or username connected to your account.</p>
                ',
                'blocks' => [
                    ['icon' => '📩', 'title' => 'General Support', 'body' => 'Questions about the website, account access, or features.'],
                    ['icon' => '🛡️', 'title' => 'Privacy Requests', 'body' => 'Ask about privacy policy, stored data, or data deletion.'],
                    ['icon' => '📝', 'title' => 'Corrections', 'body' => 'Found wrong information? Send details and we can review it.'],
                ],
                'faqs' => [
                    ['question' => 'Where do my messages go?', 'answer' => 'Messages are stored inside the website admin dashboard for review.'],
                    ['question' => 'Can I request account deletion?', 'answer' => 'Yes. Use the Data Deletion page or contact form.'],
                ],
                'meta_title' => 'Contact BangTanSonyeondan',
                'meta_description' => 'Contact BangTanSonyeondan for support, privacy, feedback, and correction requests.',
                'show_in_nav' => true,
                'show_in_footer' => true,
                'is_active' => true,
                'sort_order' => 20,
            ],

            [
                'slug' => 'privacy-policy',
                'type' => 'privacy',
                'title' => 'Privacy Policy',
                'nav_label' => 'Privacy',
                'eyebrow' => 'PRIVACY FIRST',
                'hero_title' => 'Your privacy matters here.',
                'hero_subtitle' => 'This page explains what information BangTanSonyeondan may collect, how it is used, and how users can contact us about privacy questions.',
                'intro_title' => 'Privacy Policy Overview',
                'intro_body' => 'This privacy policy is written for a fan-made BTS website with features such as accounts, quizzes, contact forms, profiles, points, and leaderboard features.',
                'content_html' => '
                    <h2>1. Information We May Collect</h2>
                    <p>BangTanSonyeondan may collect information that users provide directly, such as name, email address, username, profile details, contact messages, quiz activity, points, and account preferences.</p>

                    <h2>2. How We Use Information</h2>
                    <p>We use information to operate the website, manage user accounts, show quiz results, improve the user experience, respond to messages, protect the website, and maintain basic analytics or security records.</p>

                    <h2>3. Contact Messages</h2>
                    <p>When you submit a contact form, your name, email, subject, category, message, IP address, and browser information may be stored for admin review and security purposes.</p>

                    <h2>4. Accounts and Profiles</h2>
                    <p>If the website allows accounts, profile features, points, streaks, quizzes, avatars, or leaderboard participation, related information may be stored to provide those features.</p>

                    <h2>5. Cookies and Similar Technologies</h2>
                    <p>The website may use cookies for login sessions, security, preferences, and basic website functionality.</p>

                    <h2>6. Third-Party Links</h2>
                    <p>The website may link to official BTS, social media, YouTube, music platforms, or other external websites. We are not responsible for the privacy practices of external websites.</p>

                    <h2>7. Children and Younger Users</h2>
                    <p>This website is designed as a fan and learning experience. Younger users should use the website with guidance from a parent or guardian where required by local law.</p>

                    <h2>8. Data Deletion</h2>
                    <p>Users can request deletion of their account or personal data by using the Data Deletion page or the Contact page.</p>

                    <h2>9. Updates to This Policy</h2>
                    <p>We may update this policy when website features change. The latest version will always be available on this page.</p>

                    <h2>10. Contact</h2>
                    <p>For privacy questions, contact us through the Contact page.</p>
                ',
                'blocks' => [
                    ['icon' => '🔐', 'title' => 'Account data', 'body' => 'Used for login, profile features, quizzes, points, and user experience.'],
                    ['icon' => '📨', 'title' => 'Contact form data', 'body' => 'Used to respond to support, privacy, and feedback messages.'],
                    ['icon' => '🧹', 'title' => 'Deletion request', 'body' => 'Users can request data deletion through the Data Deletion page.'],
                ],
                'faqs' => [
                    ['question' => 'Can I delete my data?', 'answer' => 'Yes. Visit the Data Deletion page and submit your request.'],
                    ['question' => 'Is this an official BTS privacy policy?', 'answer' => 'No. This policy is for the BangTanSonyeondan fan-made website only.'],
                ],
                'meta_title' => 'Privacy Policy · BangTanSonyeondan',
                'meta_description' => 'Privacy Policy for BangTanSonyeondan fan-made BTS website.',
                'show_in_nav' => false,
                'show_in_footer' => true,
                'is_active' => true,
                'sort_order' => 30,
            ],

            [
                'slug' => 'terms',
                'type' => 'terms',
                'title' => 'Terms of Use',
                'nav_label' => 'Terms',
                'eyebrow' => 'WEBSITE RULES',
                'hero_title' => 'Terms for using BangTanSonyeondan.',
                'hero_subtitle' => 'These terms explain how visitors and users should use the website respectfully and safely.',
                'intro_title' => 'Terms of Use Overview',
                'intro_body' => 'By using BangTanSonyeondan, users agree to use the website respectfully and follow these basic rules.',
                'content_html' => '
                    <h2>1. Fan-Made Website</h2>
                    <p>BangTanSonyeondan is a fan-made website. It is not officially affiliated with BTS, HYBE, BIGHIT MUSIC, LINE FRIENDS, BT21, or any related official entity.</p>

                    <h2>2. Acceptable Use</h2>
                    <p>Users should not misuse the website, attempt to hack it, submit harmful content, spam forms, impersonate others, or abuse community features.</p>

                    <h2>3. Accounts</h2>
                    <p>If accounts are available, users are responsible for keeping their login details safe and using their account respectfully.</p>

                    <h2>4. Content</h2>
                    <p>Website content is provided for fan, educational, and entertainment purposes. We try to keep information accurate but cannot guarantee everything is always complete or error-free.</p>

                    <h2>5. Changes</h2>
                    <p>We may update features, pages, content, or these terms at any time.</p>
                ',
                'blocks' => [
                    ['icon' => '💜', 'title' => 'Respectful use', 'body' => 'Use the website in a safe, respectful, and positive way.'],
                    ['icon' => '🛡️', 'title' => 'No abuse', 'body' => 'No spam, hacking attempts, impersonation, or harmful activity.'],
                    ['icon' => '📌', 'title' => 'Fan content', 'body' => 'Content is for fan, educational, and entertainment purposes.'],
                ],
                'faqs' => [
                    ['question' => 'Can the terms change?', 'answer' => 'Yes. The terms may be updated when features or legal requirements change.'],
                ],
                'meta_title' => 'Terms of Use · BangTanSonyeondan',
                'meta_description' => 'Terms of Use for BangTanSonyeondan.',
                'show_in_nav' => false,
                'show_in_footer' => true,
                'is_active' => true,
                'sort_order' => 40,
            ],

            [
                'slug' => 'disclaimer',
                'type' => 'disclaimer',
                'title' => 'Disclaimer',
                'nav_label' => 'Disclaimer',
                'eyebrow' => 'IMPORTANT NOTICE',
                'hero_title' => 'A clear fan-site disclaimer.',
                'hero_subtitle' => 'BangTanSonyeondan is made by fans for fans and is not an official BTS, HYBE, BIGHIT MUSIC, LINE FRIENDS, or BT21 website.',
                'intro_title' => 'Disclaimer Overview',
                'intro_body' => 'This page explains the fan-made nature of the website and how content is presented.',
                'content_html' => '
                    <h2>Fan-Made Website</h2>
                    <p>BangTanSonyeondan is an independent fan-made website. It is not official, endorsed, sponsored, or managed by BTS, HYBE, BIGHIT MUSIC, LINE FRIENDS, BT21, or any related official entity.</p>

                    <h2>Content Accuracy</h2>
                    <p>We try to keep information helpful and accurate, but content may contain mistakes, outdated details, or incomplete information. Users can contact us to suggest corrections.</p>

                    <h2>External Links</h2>
                    <p>The website may include links to external platforms such as official channels, videos, social platforms, or references. External websites are controlled by their own owners.</p>

                    <h2>No Professional Advice</h2>
                    <p>Content on this website is for entertainment, fan, and educational purposes only.</p>
                ',
                'blocks' => [
                    ['icon' => '⚠️', 'title' => 'Not official', 'body' => 'This is a fan-made website, not an official BTS or HYBE platform.'],
                    ['icon' => '🔗', 'title' => 'External links', 'body' => 'External websites have their own policies and terms.'],
                    ['icon' => '📝', 'title' => 'Corrections welcome', 'body' => 'Use the contact page to suggest corrections or updates.'],
                ],
                'meta_title' => 'Disclaimer · BangTanSonyeondan',
                'meta_description' => 'Disclaimer for BangTanSonyeondan fan-made BTS website.',
                'show_in_nav' => false,
                'show_in_footer' => true,
                'is_active' => true,
                'sort_order' => 50,
            ],

            [
                'slug' => 'cookies',
                'type' => 'cookies',
                'title' => 'Cookie Policy',
                'nav_label' => 'Cookies',
                'eyebrow' => 'COOKIE POLICY',
                'hero_title' => 'How cookies may be used.',
                'hero_subtitle' => 'Cookies help the website remember sessions, improve security, and support basic features.',
                'intro_title' => 'Cookie Policy Overview',
                'intro_body' => 'This page explains how cookies and similar technologies may be used on BangTanSonyeondan.',
                'content_html' => '
                    <h2>What Are Cookies?</h2>
                    <p>Cookies are small files stored by your browser. They can help websites remember login sessions, preferences, and basic functionality.</p>

                    <h2>How We May Use Cookies</h2>
                    <ul>
                        <li>To keep users logged in.</li>
                        <li>To protect forms and sessions.</li>
                        <li>To remember preferences.</li>
                        <li>To improve website stability and user experience.</li>
                    </ul>

                    <h2>Managing Cookies</h2>
                    <p>You can manage or block cookies through your browser settings. Some website features may not work correctly if cookies are disabled.</p>
                ',
                'blocks' => [
                    ['icon' => '🍪', 'title' => 'Session cookies', 'body' => 'Used for login and basic website functionality.'],
                    ['icon' => '🛡️', 'title' => 'Security cookies', 'body' => 'Help protect forms and user sessions.'],
                    ['icon' => '⚙️', 'title' => 'Browser controls', 'body' => 'Users can manage cookies in their browser settings.'],
                ],
                'meta_title' => 'Cookie Policy · BangTanSonyeondan',
                'meta_description' => 'Cookie Policy for BangTanSonyeondan.',
                'show_in_nav' => false,
                'show_in_footer' => true,
                'is_active' => true,
                'sort_order' => 60,
            ],

            [
                'slug' => 'community-guidelines',
                'type' => 'community',
                'title' => 'Community Guidelines',
                'nav_label' => 'Community',
                'eyebrow' => 'SAFE ARMY SPACE',
                'hero_title' => 'Keep this space respectful and kind.',
                'hero_subtitle' => 'BangTanSonyeondan is designed to be a positive fan space. These guidelines help keep the website safe and respectful.',
                'intro_title' => 'Community Guidelines Overview',
                'intro_body' => 'Users should treat others with kindness, avoid harmful behavior, and respect artists, fans, creators, and copyright owners.',
                'content_html' => '
                    <h2>Be Respectful</h2>
                    <p>Do not harass, insult, threaten, bully, or target other users or communities.</p>

                    <h2>No Harmful Content</h2>
                    <p>Do not post spam, scams, hateful content, explicit content, dangerous content, or anything that harms the website or users.</p>

                    <h2>Respect Copyright</h2>
                    <p>Do not upload or submit content that you do not have permission to use.</p>

                    <h2>Positive ARMY Energy</h2>
                    <p>This website should feel safe, fun, and welcoming for BTS fans.</p>
                ',
                'blocks' => [
                    ['icon' => '💜', 'title' => 'Be kind', 'body' => 'Respect other fans and keep the energy positive.'],
                    ['icon' => '🚫', 'title' => 'No spam or abuse', 'body' => 'Do not misuse forms, accounts, or interactive features.'],
                    ['icon' => '🎨', 'title' => 'Respect creators', 'body' => 'Do not submit content you do not have permission to use.'],
                ],
                'meta_title' => 'Community Guidelines · BangTanSonyeondan',
                'meta_description' => 'Community Guidelines for BangTanSonyeondan.',
                'show_in_nav' => false,
                'show_in_footer' => true,
                'is_active' => true,
                'sort_order' => 70,
            ],

            [
                'slug' => 'copyright',
                'type' => 'copyright',
                'title' => 'Copyright and Credits',
                'nav_label' => 'Copyright',
                'eyebrow' => 'CREDITS',
                'hero_title' => 'Respecting artists, creators, and official sources.',
                'hero_subtitle' => 'This page explains copyright respect, credits, external links, and content removal requests.',
                'intro_title' => 'Copyright and Credits Overview',
                'intro_body' => 'BangTanSonyeondan respects artists, creators, official platforms, and intellectual property owners.',
                'content_html' => '
                    <h2>Ownership</h2>
                    <p>BTS, BT21, related names, media, trademarks, logos, and official content belong to their respective owners.</p>

                    <h2>Fan and Educational Use</h2>
                    <p>This website is created as a fan-made educational and entertainment space. We aim to support official channels and avoid misrepresenting ownership.</p>

                    <h2>Removal Requests</h2>
                    <p>If you own rights to content displayed on this website and want it credited, updated, or removed, please contact us with details.</p>

                    <h2>Official Support</h2>
                    <p>Fans should support official BTS channels, music platforms, merchandise stores, and verified social media accounts.</p>
                ',
                'blocks' => [
                    ['icon' => '©️', 'title' => 'Rights respected', 'body' => 'Official names and content belong to their respective owners.'],
                    ['icon' => '📮', 'title' => 'Removal requests', 'body' => 'Rights owners can contact us for credit or removal requests.'],
                    ['icon' => '🌟', 'title' => 'Support official', 'body' => 'Fans are encouraged to support official BTS platforms.'],
                ],
                'meta_title' => 'Copyright and Credits · BangTanSonyeondan',
                'meta_description' => 'Copyright and Credits information for BangTanSonyeondan.',
                'show_in_nav' => false,
                'show_in_footer' => true,
                'is_active' => true,
                'sort_order' => 80,
            ],

            [
                'slug' => 'data-deletion',
                'type' => 'data-deletion',
                'title' => 'Data Deletion',
                'nav_label' => 'Data Deletion',
                'eyebrow' => 'USER DATA',
                'hero_title' => 'Request account or data deletion.',
                'hero_subtitle' => 'Users can request deletion of account-related data by contacting us with the required details.',
                'intro_title' => 'How to request deletion',
                'intro_body' => 'Send a message using the contact form and include the email or username connected to your account.',
                'content_html' => '
                    <h2>Data Deletion Request</h2>
                    <p>If you want to delete your account or personal data connected to BangTanSonyeondan, please use the Contact page and choose the Privacy category.</p>

                    <h2>What to Include</h2>
                    <ul>
                        <li>Your account email or username.</li>
                        <li>A clear request such as “Please delete my account/data.”</li>
                        <li>Any extra details that help us identify your account.</li>
                    </ul>

                    <h2>What May Be Deleted</h2>
                    <p>Depending on the website features you used, deletion may include profile details, quiz records, points, contact messages, and account information where technically possible.</p>

                    <h2>Security</h2>
                    <p>We may need to verify the request before deleting data to protect users from unauthorized deletion requests.</p>
                ',
                'blocks' => [
                    ['icon' => '🧹', 'title' => 'Delete request', 'body' => 'Use the contact form and choose Privacy as the category.'],
                    ['icon' => '🔎', 'title' => 'Verification', 'body' => 'We may verify the account before deleting data.'],
                    ['icon' => '✅', 'title' => 'Admin managed', 'body' => 'Requests appear inside the admin dashboard for review.'],
                ],
                'faqs' => [
                    ['question' => 'Where do I send deletion requests?', 'answer' => 'Use the Contact page and select Privacy as the category.'],
                    ['question' => 'What details should I include?', 'answer' => 'Include your account email, username, and a clear deletion request.'],
                ],
                'cta_label' => 'Request Deletion',
                'cta_url' => '/contact',
                'meta_title' => 'Data Deletion · BangTanSonyeondan',
                'meta_description' => 'Request account or personal data deletion from BangTanSonyeondan.',
                'show_in_nav' => false,
                'show_in_footer' => true,
                'is_active' => true,
                'sort_order' => 90,
            ],
        ];

        foreach ($pages as $page) {
            SitePage::updateOrCreate(
                ['slug' => $page['slug']],
                $page
            );
        }
    }
}