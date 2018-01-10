-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2017 at 01:16 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krol_testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--
DROP TABLE IF EXISTS `feed`;

CREATE TABLE `feed` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pub_date` datetime NOT NULL,
  `guid` int(11) DEFAULT NULL,
  `category` longtext COLLATE utf8_unicode_ci,
  `comment` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`id`, `title`, `description`, `link`, `pub_date`, `guid`, `category`, `comment`) VALUES
(1, 'Complete Guide to RSS and How to Use It with WordPress', 'What if users did not have to come to your WordPress site in order to read your articles? That would certainly make it easier for users since they would not have to navigate to ten of their favorite blogs and news sources to get their daily information. It would also be nice for the website owners, since it would allow you to distribute your content in a more efficient manner, delivering the content to where the customers want it to be.<br />\n<br />\n<a href=\"http://www.wpexplorer.com/complete-guide-rss-use-wordpress/\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2242', '2017-11-13 09:00:00', 2242, '', ''),
(2, 'Twitter will identify political ads and disclose who paid for them', 'Twitter has been in hot water as more evidence emerges showing how Russia used the social network to influence public opinion. Ahead of a November 1st Congressional hearing on Russian manipulation, Twitter has introduced sweeping new rules for how it shares data on political posts. The network will launch a <i>Transparency Center</i> that lists all ads appearing on Twitter, including promoted ones that previously only appeared to targeted demographics, and will clearly label them when they appear in user feeds.<br />\n<br />\n<br />\n<a href=\"https://www.engadget.com/2017/10/24/twitter-will-identify-political-ads-and-disclose-who-paid-for-th/\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2241', '2017-11-10 09:00:11', 2241, '', ''),
(3, 'Social networks can learn about you through your friends', 'Some people might think that online privacy is, well, a private matter. If you don’t want personal information getting out online, then you can just not put it out there. Right? Wrong. Keeping your information private isn’t solely your choice anymore. Friends can play a big role in your privacy, new data show. And the more they share on a social network, the more that social network can figure out about you.<br />\n<br />\nSomeone who joins a social network — such as Snapchat, Instagram or Facebook —wants to find their friends. Often, the social network can help. Many apps offer to import contact lists from your phone or e-mail. These apps then use that information to find matches with people already in the network, and suggest them to you.<br />\n<br />\n<a href=\"https://www.sciencenewsforstudents.org/article/social-networks-can-learn-about-you-through-your-friends\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2240', '2017-11-08 21:09:00', 2240, '', ''),
(4, 'Facebook acquiring tbh, a social network popular with teens', 'Facebook is adding to its collection of apps. This time, a social network called tbh, popular with teens.<br />\n<br />\n<a href=\"https://www.cnet.com/news/facebook-acquiring-tbh-a-social-network-popular-with-teens/\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2239', '2017-11-06 09:00:00', 2239, '', ''),
(5, 'The Struggles of a Journalist in a Social Networking World', 'Social networking sites have moved to the foreground of news consumption for the masses. Politicians now take to Twitter to reach citizens directly: Facebook has algorithms to decide what news will encounter the highest <i>click baits</i> and Snapchat offers ‘snap’ news stories at the bottom of your friends update<br />\n<br />\n<a href=\"http://www.redbrick.me/comment/slider-comment/struggles-journalist-social-networking-world/\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2238', '2017-11-04 09:00:00', 2238, '', ''),
(6, 'Social media stars reveal how they really get rich', ' For a growing number of people, their activities online have become their real jobs. Achieving <i>influencer</i> status on Instagram or YouTube can help a onetime enthusiast who filmed videos from his childhood bedroom earn a legitimate six-figure salary. Today, social-media stardom is no longer a springboard to a mainstream career but a career in and of itself. For these tech-savvy self-promoters, there’s a lucrative world of freebies, sponsorships and other moneymaking opportunities at their fingertips.<br />\n<br />\n<a href=\"http://nypost.com/2017/10/28/online-influencers-reveal-how-they-really-get-free-clothes-and-six-figure-salaries/\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2237', '2017-11-02 09:00:00', 2237, '', ''),
(7, '5 Ways To Put the Social Back In Social Media', 'Remember the good old days (a la 2009) when social media was fun?<br />\n<br />\nThink back to a time before all talk turned to fake news, algorithm hacks and carefully curated influencer feeds.<br />\n<br />\n<a href=\"https://www.forbes.com/sites/amyschoenberger/2017/10/28/5-ways-to-put-the-social-back-in-social-media/#79c546196bff\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2236', '2017-10-31 09:00:00', 2236, '', ''),
(8, 'Twitter is the latest to fill your feed with auto-playing video ads', 'Your Twitter feed is going to get even busier thanks to the microblogging service unlocking auto-playing video ads for advertisers. Starting today Video Website Cards are available to every ad-buyer. In limited beta tests (like the one embedded below; videos do not seem to work with embeds), Twitter has found them pretty successful, with a 200 percent higher clickthrough rate compared to the leading standard. So yeah, expect to see an awful lot more of these coming soon.<br />\n<br />\n<a href=\"https://www.engadget.com/2017/10/17/twitter-auto-playing-video-ads/\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2235', '2017-10-28 14:00:10', 2235, '', ''),
(9, 'How to Add a Twitter Feed to Your RSS Reader', 'Those of you who are in a habit of maintaining an RSS reader to consume information from worldwide publications, authors and people you’re interested in hearing from, here is a tool to help you do so on Twitter.<br />\n<br />\n<a href=\"https://www.guidingtech.com/67841/twitter-rss-feed/\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2234', '2017-10-20 09:00:00', 2234, '', ''),
(10, 'Googling Indexing Your Podcast Feed', 'While there may be businesses that specify in SEO, to many, Google Search Engine Optimization remains a mystery. In fact, Google is constantly making changes, refining how they want results to be displayed to its users.<br />\n<br />\n<a href=\"https://www.gonnageek.com/2017/05/google-is-indexing-your-podcasts-rss-feed/\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2233', '2017-10-18 09:00:00', 2233, '', ''),
(11, 'Five Android apps to feed your RSS needs', 'RSS offers an efficient way to stay in the know, but the right newsreader can make a big difference. Here are five outstanding Android apps that should do the trick.<br />\n<br />\n<a href=\"http://www.techrepublic.com/blog/five-apps/five-android-apps-to-feed-your-rss-needs/\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2232', '2017-10-16 09:00:00', 2232, '', ''),
(12, '5 Social Media Trends That Will Have Maximum Impact in 2018', 'With more and more brands trying to connect with audiences across an array of social channels, the attention span of people is on a decline.<br />\n<br />\nBusinesses need to quickly figure out what’s best for their audiences in order to generate better engagement and increased brand loyalty.<br />\n<br />\nHere are five crucial social media trends that will have the maximum impact on your social media strategy in 2018 and ahead.<br />\n<br />\n<a href=\"http://www.adweek.com/digital/guy-sheetrit-over-the-top-seo-guest-post-5-social-media-trends-that-will-have-maximum-impact-in-2018/\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2231', '2017-10-13 09:00:00', 2231, '', ''),
(13, 'Researchers are studying your social media. What do you think of that?', 'Have you tweeted, posted an Instagram photo or just generally engaged in social media before? Then it’s possible you have been part of a research experiment of sorts. Think that raises some ethical questions? You are not the only one.<br />\n<br />\n<a href=\"http://www.denverpost.com/2017/09/18/cu-boulder-social-media-ethics-research/\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2230', '2017-10-11 09:00:00', 2230, '', ''),
(14, 'Why RSS Still Beats Facebook and Twitter for Tracking News', 'You would be forgiven for thinking RSS died off with the passing of Google Reader, but our old friend Really Simple Syndication (or Rich Site Summary) still has a role to play on the web of 2017. It is faster, more efficient, and you will not have to worry as much about accidentally leaking your news reading habit to all your Facebook friends. <br />\n<br />\n<a href=\"http://fieldguide.gizmodo.com/why-rss-feeds-still-beat-facebook-and-twitter-for-track-1800722740\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2229', '2017-10-09 09:00:00', 2229, '', ''),
(15, 'Where Is Social Media Headed in 2018 and Beyond?', 'It is important for entrepreneurs to understand how social media is evolving and changing -- 2.8 billion people use social media. In terms of advertising new products and services, there are few things more potent and ubiquitous than social media.<br />\n<br />\n<a href=\"https://www.entrepreneur.com/article/300127\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2228', '2017-10-06 09:00:00', 2228, '', ''),
(16, '6 Social Media Trends to Prepare for in 2018', '2018 is only four months away, and brands have to prepare to take advantage of the opportunities social media presents -- or their competitors will.<br />\n<br />\nWhen it comes to reaching audiences, effectively distributing your content, and building a following around your brand, social media offers a wealth of possibilities. It\'s where your audiences already live and engage with content, which makes it a convenient platform for brands. Its built-in analytics allow you to track and improve your efforts over time. Plus, all the free social-media tools make it easy to use and maintain an active presence.<br />\n<br />\nAs you look ahead to 2018 and begin planning for ways to strengthen your social strategy, it is important to keep a pulse on trends. <br />\n<br />\n<a href=\"https://www.inc.com/john-hall/6-social-media-trends-to-prepare-for-in-2018.html\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2227', '2017-10-04 09:00:00', 2227, '', ''),
(17, 'How to Create Powerful Social Network Platform in 8 Steps', 'How did Mark Zuckerberg change the world? He built a global community that brings people closer together. The origins of Facebook are available to the general public. Everyone is familiar with the story of building social network platform that will greatly impact human relations and economy. Mark\'s vision of community opened a door to many variations of social media network platforms that today exist. Jack Dorsey created Twitter in March 2006. Rome may not have been built in a day, but Twitter was built in just two weeks, says Jack.<br />\n<br />\nA few years later Kevin Systrom and Mike Krieger built a pared - down photo app today known as Instagram.<br />\n<br />\n<a href=\"https://www.inc.com/john-rampton/how-to-create-powerful-social-network-platform-in-.html\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2226', '2017-10-02 09:00:00', 2226, '', ''),
(18, 'The Impact of Social Media on Todays Teenagers', 'Currently, the world’s population is 7.5 billion, 3.8 billion are internet users and 2.8 billion of them are social media users. 1.8 billion of the entire world population is made up by teenagers from the ages of 13-19 years old. Instagram alone has 500 million active monthly users. Instagram users have shared over 40 billion photos to date and share an average of 95 million photos and videos per day. Snapchat has 166 million daily users. Although adults do also use some social media, teenagers are the majority of users.<br />\n<br />\n<a href=\"http://parsippanyfocus.com/2017/09/02/the-impact-of-social-media-on-todays-teenagers/\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2225', '2017-09-29 09:00:00', 2225, '', ''),
(19, 'Feed Hawk hunts down YouTube channel RSS feeds for you', 'Are you still using RSS? If you are (and you should be, as we’ll see in a moment), then you should use the Feed Hawk app on your iPhone and iPad. Feed Hawk puts itself in your iOS Share Sheet and locates the RSS feed(s) from any website you visit. If you want, it can automatically subscribe you to the RSS feed in your RSS reader of choice.<br />\n<br />\nThe latest version of Feed Hawk can even find feeds for YouTube channels. That, in case you are wondering, is huge.<br />\n<br />\n<a href=\"https://www.cultofmac.com/499612/feed-hawk-rss-feed-finder-youtube-channels/\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2224', '2017-09-27 09:00:00', 2224, '', ''),
(20, 'Time Saving Tool', 'I am going to mostly skip talking about what RSS is beyonds a lightweight summary of web site news stories, blog posts. An RSS reader allows you, in one interface, to quickly skim the recent publications for mayne 100s of web sites.. without having to visit them.<br />\n<br />\n<a href=\"http://cogdogblog.com/2017/09/indispensable-tool/\" target=\"_blank\" >complete article</a>', 'http://www.rss-specifications.com/blog.htm#2223', '2017-09-25 09:00:49', 2223, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
