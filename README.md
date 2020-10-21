# Riot PHP
PHP wrapper around Riot Games APIs. 

### Features
- 🎉 PSR-18 & PSR-17 compliant - no more dependency on one specific HTTP Client!
- 🎉 Dependency-injection first - easy usage with all modern frameworks! 
- 🎉 GitHub Actions for Quality Assurance - it just works!
- 🎉 Single Responsibility - only API communication inside!

## Getting started
Riot PHP is available via [Composer](https://getcomposer.org/). It does not implement HTTP Client on its own
and uses PSR-17 and PSR-18 abstraction so you are free to choose any HTTP Client you want. 

```
composer require simivar/riot-php symfony/http-client nyholm/psr7
```

# Legal notice
Riot PHP isn't endorsed by Riot Games and doesn't reflect the views or opinions of Riot Games or anyone officially 
involved in producing or managing Riot Games properties. Riot Games, and all associated properties are trademarks 
or registered trademarks of Riot Games, Inc.
