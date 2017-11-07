﻿<?xml version="1.0" encoding="UTF-8"?>
<configuration>
  <system.webServer>
    <rewrite>
      <rules>
        <rule name="WordPress Rule 1" stopProcessing="true">
          <match url="^index\.php$" ignoreCase="false" />
          <action type="None" />
        </rule>
        <rule name="WordPress Rule 2" stopProcessing="true">
          <match url="^([_0-9a-zA-Z-]+/)?files/(.+)" ignoreCase="false" />
          <action type="Rewrite" url="wp-includes/ms-files.php?file={R:2}" appendQueryString="false" />
        </rule>
        <rule name="WordPress Rule 3" stopProcessing="true">
          <match url="^([_0-9a-zA-Z-]+/)?wp-admin$" ignoreCase="false" />
          <action type="Redirect" url="{R:1}wp-admin/" redirectType="Permanent" />
        </rule>
        <rule name="WordPress Rule 4" stopProcessing="true">
          <match url="^" ignoreCase="false" />
          <conditions logicalGrouping="MatchAny">
            <add input="{REQUEST_FILENAME}" matchType="IsFile" ignoreCase="false" />
            <add input="{REQUEST_FILENAME}" matchType="IsDirectory" ignoreCase="false" />
          </conditions>
          <action type="None" />
        </rule>
        <rule name="WordPress Rule 5" stopProcessing="true">
          <match url="^([_0-9a-zA-Z-]+/)?(wp-(content|admin|includes).*)" ignoreCase="false" />
          <action type="Rewrite" url="{R:2}" />
        </rule>
        <rule name="WordPress Rule 6" stopProcessing="true">
          <match url="^([_0-9a-zA-Z-]+/)?(.*\.php)$" ignoreCase="false" />
          <action type="Rewrite" url="{R:2}" />
        </rule>
        <rule name="WordPress Rule 7" stopProcessing="true">
          <match url="." ignoreCase="false" />
          <action type="Rewrite" url="index.php" />
        </rule>
      </rules>
    </rewrite>
  </system.webServer>
</configuration>