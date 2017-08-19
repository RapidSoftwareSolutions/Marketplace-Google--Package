[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Google+/functions?utm_source=RapidAPIGitHub_Google+Functions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Google+ Package
The Google+ API is the programming interface to Google+. You can use the API to integrate your app or website with Google+. This enables users to connect with each other for maximum engagement using Google+ features from within your application.
* Domain: [plus.google.com](https://plus.google.com)
* Credentials: clientId, clientSecret

## How to get credentials: 
1. Go to the [Google API Console](https://console.developers.google.com). 
2. From the project drop-down, select a project,or create a new one.
3. Enable the Google+ API service.
4. When the process completes, Google+ API appears in the list of enabled APIs.
5. In the sidebar under "APIs & Services", select Credentials.

## Google+.getAccessToken
Exchanging authorization codes for access tokens and refresh tokens.To limit exposure that could result from the loss of this token, it has a medium lifetime, usually expiring after an hour or so.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| A string that identifies the request origin as Google. This string must be registered within your system as Google's unique identifier.
| clientSecret| credentials| A secret string that you registered with Google for your service.
| code        | String     | The code Google received from either your sign-in or token exchange endpoint.
| redirectUri | String     | The URL to which to send the response to this request.

## Google+.refreshToken
Exchanging refresh tokens for access tokens.When your service is integrated with Google, this token is exclusively stored and used by Google. Google uses your server to exchange refresh tokens for access tokens, which are in turn used to access data.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| A string that identifies the request origin as Google. This string must be registered within your system as Google's unique identifier.
| clientSecret| credentials| A secret string that you registered with Google for your service.
| refreshToken| String     | The refresh token Google received from your getAccessToken endpoint.

## Google+.getUser
Get a person's profile.If successful, this method returns a person resource in the response body.If using the userId value "me", this method requires authentication using a token that has been granted the OAuth scope plus.login or plus.me.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token Google received from your getAccessToken endpoint.
| userId     | String| The ID of the person to get the profile for. The special value `me` can be used to indicate the authenticated user.
| fields     | List  | List specifying which fields to include in a partial response.
| prettyPrint| Select| If set to `true`, data output will include line breaks and indentation to make it more readable. If set to `false`, unnecessary whitespace is removed, reducing the size of the response. Defaults to `true`.
| userIp     | String| Identifies the IP address of the end user for whom the API call is being made.

## Google+.getUsersByActivityId
List all of the people in the specified collection for a particular activity.The collection parameter specifies which people to list, such as people who have +1`d or reshared this activity. For large collections, results are paginated. 

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token Google received from your getAccessToken endpoint.
| activityId | String| The ID of the activity to get the list of people for.
| collection | Select| The collection of people to list.`Plusoners`: List all people who have +1'd this activity.`Resharers`: List all people who have reshared this activity.
| maxResults | Number| The maximum number of people to include in the response, which is used for paging.
| pageToken  | String| The continuation token, which is used to page through large result sets. To get the next page of results, set this parameter to the value of `nextPageToken` from the previous response.

## Google+.getUsersBySearchQuery
Search all public profiles. For large result sets, results are paginated. For the most up-to-date search results, do not use a pageToken older than five minutes. Instead, restart pagination by repeating the original request (omitting pageToken). 

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token Google received from your getAccessToken endpoint.
| searchQuery| String| Specify a query string for full text search of public text in all profiles.
| language   | Select| Specify the preferred language to search with. See all list [here](https://developers.google.com/+/web/api/rest/search#available-languages).
| maxResults | Number| The maximum number of people to include in the response, which is used for paging.For any response, the actual number returned might be less than the specified maxResults. Acceptable values are 1 to 100, inclusive. (Default: 20).
| pageToken  | String| The continuation token, which is used to page through large result sets. To get the next page of results, set this parameter to the value of `nextPageToken` from the previous response.

## Google+.getCommentsByActivityId
List all of the comments for an activity.A comment has an actor who posted the comment, text content of the comment, when the comment was created and last updated, and other properties.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token Google received from your getAccessToken endpoint.
| activityId | String| The ID of the activity to get comments for.
| sortOrder  | Select| The order in which to sort the list of comments.`ascending`: Sort oldest comments first(default),`descending`: Sort newest comments first. 
| maxResults | Number| The maximum number of people to include in the response, which is used for paging.For any response, the actual number returned might be less than the specified maxResults. Acceptable values are 1 to 100, inclusive. (Default: 20).
| pageToken  | String| The continuation token, which is used to page through large result sets. To get the next page of results, set this parameter to the value of `nextPageToken` from the previous response.

## Google+.getComment
Get a comment.If successful, this method returns a comment resource in the response body.A comment has an actor who posted the comment, text content of the comment, when the comment was created and last updated, and other properties.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token Google received from your getAccessToken endpoint.
| commentId  | String| The ID of the person to get the profile for. The special value `me` can be used to indicate the authenticated user.
| fields     | List  | List specifying which fields to include in a partial response.The format of the fields request parameter value is loosely based on XPath syntax. The supported syntax is summarized below; additional examples are provided in the following section.See [more](https://developers.google.com/+/web/api/rest/#partial-response).
| prettyPrint| Select| If set to `true`, data output will include line breaks and indentation to make it more readable. If set to `false`, unnecessary whitespace is removed, reducing the size of the response. Defaults to `true`.
| userIp     | String| Identifies the IP address of the end user for whom the API call is being made.

## Google+.getActivity
Get an activity.If successful, this method returns a activity resource in the response body.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token Google received from your getAccessToken endpoint.
| activityId | String| The ID of the activity to get.
| fields     | List  | List specifying which fields to include in a partial response.The format of the fields request parameter value is loosely based on XPath syntax. The supported syntax is summarized below; additional examples are provided in the following section.See [more](https://developers.google.com/+/web/api/rest/#partial-response).
| prettyPrint| Select| If set to `true`, data output will include line breaks and indentation to make it more readable. If set to `false`, unnecessary whitespace is removed, reducing the size of the response. Defaults to `true`.
| userIp     | String| Identifies the IP address of the end user for whom the API call is being made.

## Google+.getActivitiesByUserId
List all of the activities in the specified collection for a particular user.The collection parameter specifies which activities to list, such as public activities.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token Google received from your getAccessToken endpoint.
| userId     | String| The ID of the user to get activities for. The special value `me` can be used to indicate the authenticated user.
| collection | Select| The collection of activities to list.`public`: All public activities created by the specified user.
| maxResults | Number| The maximum number of people to include in the response, which is used for paging.For any response, the actual number returned might be less than the specified maxResults. Acceptable values are 1 to 100, inclusive. (Default: 20)
| pageToken  | String| The continuation token, which is used to page through large result sets. To get the next page of results, set this parameter to the value of `nextPageToken` from the previous response.

## Google+.getActivitiesBySearchQuery
Search public activities.For large result sets, results are paginated. For large result sets, results are paginated. For the most up-to-date search results, do not use a pageToken older than five minutes. Instead, restart pagination by repeating the original request (omitting pageToken).

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token Google received from your getAccessToken endpoint.
| searchQuery| String| Full-text search query string.
| orderBy    | Select| Specifies how to order search results.`Best`: Sort activities by relevance to the user, most relevant first.`Recent`: Sort activities by published date, most recent first.(default)
| maxResults | Number| The maximum number of people to include in the response, which is used for paging.For any response, the actual number returned might be less than the specified maxResults. Acceptable values are 1 to 100, inclusive. (Default: 20).
| pageToken  | String| The continuation token, which is used to page through large result sets. To get the next page of results, set this parameter to the value of `nextPageToken` from the previous response.
| language   | Select| Specify the preferred language to search with.See all list [here](https://developers.google.com/+/web/api/rest/search#available-languages).

