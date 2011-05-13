# Outbound Flows for OpenVBX

This plugin allows you to call out using flows or trigger outgoing calls or texts within another flow.

## Installation

[Download][1] the plugin and extract to /plugins

[1]: https://github.com/chadsmith/OpenVBX-Plugin-Outbound/archives/master

## Usage

Once installed, OUTBOUND will appear in the OpenVBX sidebar

### Call out with a Flow

1. Click Start Flow in the OpenVBX sidebar
2. Enter the number to call
3. Select the Flow to call with
4. Select the caller ID (OpenVBX number) to call with

### Trigger a call to another number from a Flow

1. Add the New Call applet to a Call or SMS flow
2. Select the caller ID (OpenVBX number) to call with
3. Select the Flow to call with
4. Enter the number to call

### Trigger an SMS to another number from a Flow

1. Add the New Text applet to a Call or SMS flow
2. Select the caller ID (OpenVBX number) to call with
3. Enter the number to text
3. Enter the message to text*

`* Use %caller% or %sender% to substitute the caller's number, %number% for the number called or %body% for the message body`

Responses are recorded one option at a time so it's best to use the Poll applet after a Menu or Match applet

1. Add the Poll applet to your Call or SMS flow
2. Select the poll
3. Select the option of the poll response

### Viewing poll responses

1. Click Manage Polls in the OpenVBX sidebar
2. Find the poll you want to view
3. Click the number of Responses

## Examples

### Creating a poll

Poll Name

`Best Ninja Turtle`

Options

`Leo`
`Raph`
`Mikey`
`Donny`

### Call Flow

**Menu Applet**

Read Text

`Thank you for calling the Ninja Turtle Poll. Which Ninja Turtle do you think is the best? For Leonardo, press 1. For Raphael, press 2. For Michelangelo, press 3. For Donatello, press 4.`

Menu Options

Enter 1 for the first keypress and drop a Poll applet

**Poll Applet**

Select *Best Ninja Turtle*

Select *Leo*

Drop a Greeting applet for the next applet

**Greeting Applet**

Read Text

`Your vote for Leonardo has been recorded.`

Return to the **Menu Applet** and repeat for keypresses 2-4

### SMS Flow

**Match Applet**

Enter *Leo* for the first keyword and drop a Poll applet

**Pool Applet**

Select *Best Ninja Turtle*

Select *Leo*

Drop Send a Reply for the next applet

**Reply Applet**

Message

`Your vote for Leonardo has been recorded.`

Return to the **Match Applet** and repeat for keywords Raph, Mikey and Donny

Drop Send a Reply for the default response

**Reply Applet**

Message

`Thank you for texting the Ninja Turtle Poll. Which Ninja Turtle do you think is the best? Reply with Leo, Raph, Mikey or Donny to vote.`
